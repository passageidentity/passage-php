# #!/bin/bash
# set -e

if [ -z "$1" ]; then
  echo "Required generator file is missing."
  exit 1
fi

file="$1"

rm -rf ./generated
npm install @openapitools/openapi-generator-cli -g

mv ./docs/Passage ./Passage
rm -rf ./docs

openapi-generator-cli generate \
  -i "$file" \
  -g php \
  -o ./generated \
  --additional-properties=modelPropertyNaming=original

rm generated/composer.json
rm generated/.gitignore

mv ./generated/docs ./
mv ./Passage ./docs
