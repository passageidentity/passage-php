# #!/bin/bash
# set -e

if [ -z "$1" ]; then
  echo "Required generator file is missing."
  exit 1
fi

file="$1"

rm -rf ./generated
npm install @openapitools/openapi-generator-cli -g

openapi-generator-cli generate \
  -i "$file" \
  -g php \
  -o ./generated \
  --additional-properties=modelPropertyNaming=original

rm generated/composer.json
rm generated/.gitignore
rm -r ./docs/Model
mv -f generated/docs/Model ./docs/Model
rm -rf generated/docs/

add_passage_version_header() {
  local header_comment="// Add Passage version header"

  if grep -q "$header_comment" generated/lib/HeaderSelector.php; then
    echo "Passage version header already exists"
    return 0
  fi

  local package_name="passage-php"

  sed -i "/return \$headers;/i \\
        $header_comment\\
        try {\\
            \$packageVersion = \\\\Composer\\\\InstalledVersions::getPrettyVersion('passageidentity/$package_name');\\
            \$headers['Passage-Version'] = '$package_name ' . \$packageVersion;\\
        } catch (\\\\Throwable \$ignored) {\\
            // Don't throw an exception if we can't determine the package version\\
        }\\
" \
  generated/lib/HeaderSelector.php
}

add_passage_version_header
