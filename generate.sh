# #!/bin/bash
set -e

if [ -z "$1" ]; then
  echo "Required generator file is missing."
  exit 1
fi

file="$1"

rm -rf ./src/generated/*

docker run --rm -v "${PWD}:/local" -u $(id -u) openapitools/openapi-generator-cli:v7.12.0 generate \
  -i "/local/$file" \
  -g php-nextgen \
  -o /local/temp \
  --global-property apiTests=false,modelTests=false,apiDocs=false,modelDocs=false

mv ./temp/src/* ./src/generated
rm -rf ./temp

add_passage_version_header() {
  local header_comment="// Add Passage version header"

  if grep -q "$header_comment" src/generated/HeaderSelector.php; then
    echo "Passage version header already exists"
    return 0
  fi

  local package_name="passage-php"

  sed -i "/return \$headers;/i \\
        $header_comment\\
        \$packageVersion = 'unknown';\\
\\
        try {\\
            \$packageVersion = \\\\Composer\\\\InstalledVersions::getPrettyVersion('passageidentity/$package_name');\\
        } catch (\\\\Throwable \$ignored) {\\
            // Don't throw an exception if we can't determine the package version\\
        }\\
\\
        \$headers['Passage-Version'] = '$package_name ' . \$packageVersion;\\
" \
  src/generated/HeaderSelector.php
}

# php-nextgen is generating error model return values from the API instead of void for some operations
# so this changes the return value back to void
return_void() {
  local bad_user_return_type=' \\OpenAPI\\Client\\Model\\Model401Error|\\OpenAPI\\Client\\Model\\Model404Error|\\OpenAPI\\Client\\Model\\Model500Error'
  sed -i 's/'"$bad_user_return_type"'/ void/' src/generated/Api/UsersApi.php
  sed -i 's/'"$bad_user_return_type"'/ void/' src/generated/Api/UserDevicesApi.php

  local bad_token_return_type=' \\OpenAPI\\Client\\Model\\Model401Error|\\OpenAPI\\Client\\Model\\Model403Error|\\OpenAPI\\Client\\Model\\Model404Error|\\OpenAPI\\Client\\Model\\Model500Error'
  sed -i 's/'"$bad_token_return_type"'/ void/' src/generated/Api/TokensApi.php
}

add_passage_version_header
return_void
