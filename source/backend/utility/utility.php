<?php

function isAssociative($array): bool
{
    if (!is_array($array)) return false;
    return array_keys($array) !== range(0, count($array) - 1);
}

function createSlug(string $name): string 
{
    return str_replace(' ', '-', $name);
}

function decodeData(String $rawData): array
{
    if (!$rawData)
        throw new ErrorException('No raw JSON is defined.');

    $rawData = file_get_contents($rawData);
    $contents = json_decode($rawData, true);
    if (!$contents)
        throw new JsonException('JSON contents cannot be decoded.');

    return $contents;
}

function kebabToCamelCase(string $string): string {
    // Converts kebab-case to camelCase
    return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $string))));
}

function kebabToSentenceCase(string $string): string {
    return str_replace('-', ' ', $string);
}

function camelToSentenceCase(string $string): string {
    // Converts camelCase to sentence case
    return ucfirst(trim(preg_replace('/([a-z])([A-Z])/', '$1 $2', $string)));
}

function camelToKebabCase(string $string): string {
    return strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $string));
}

function sentenceToKebabCase(string $string): string {
    // Converts sentence case to kebab-case
    return strtolower(str_replace(' ', '-', trim($string)));
}




// TODO: Remove this
function getRandomCategoryPath(array $categories): array
{
    // Map of categories by id for quick lookup
    $byId = [];
    foreach ($categories as $cat) {
        $byId[$cat['id']] = $cat;
    }

    // Get only child categories (categories with a parentId)
    $childCategories = array_filter($categories, fn($cat) => $cat['parentId'] !== null);

    // Pick a random child
    $randomChild = $childCategories[array_rand($childCategories)];

    // Traverse upward to collect parent chain
    $path = [$randomChild['name']];
    $current = $randomChild;

    while ($current['parentId'] !== null) {
        $parentIdHex = $current['parentId'];
        if (!isset($byId[$parentIdHex])) {
            break; // orphan, shouldn't happen
        }
        $parent = $byId[$parentIdHex];
        array_unshift($path, $parent['name']);
        $current = $parent;
    }

    return $path;
}

