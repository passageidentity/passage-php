# #!/bin/bash
# set -e

if [ -z "$1" ]; then
  echo "Required generator file is missing."
  exit 1
fi

file="$1"

rm -rf ./generated

docker run --rm -v "${PWD}:/local" -u $(id -u) openapitools/openapi-generator-cli:latest generate \
  -i "/local/$file" \
  -g php-nextgen \
  -o /local/temp \
  --global-property apiTests=false,modelTests=false,apiDocs=false,modelDocs=false

mkdir -p ./generated/lib
mv ./temp/src/* ./generated/lib
rm -rf ./temp

add_passage_version_header() {
  local header_comment="// Add Passage version header"

  if grep -q "$header_comment" generated/lib/HeaderSelector.php; then
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
  generated/lib/HeaderSelector.php
}

add_passage_version_header
