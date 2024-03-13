<?php
require_once("connexion.php");

function findAllCategories()
{
    global $conn;

    $query = "SELECT * FROM categories";
    $statement = $conn->prepare($query);
    $statement->execute();

    
    $results=[];

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $result = [
            'id' => $row['id'],
            'name' => $row['name']
        ]; // Ajout de la virgule ici
        $results[] = $result;
    }
    
    return $results;
}

function findCategoryById(int $categoryId)
{
    global $conn;

    $query = "SELECT * FROM categories WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->bindParam(1, $categoryId, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_NUM);
}

function insertCategory(string $name)
{
    global $conn;

    $query = "INSERT INTO categories (name) VALUES (?)";
    $statement = $conn->prepare($query);
    $statement->bindValue(1, $name, PDO::PARAM_STR);

    return $statement->execute();
}

function updateCategory(int $categoryId, string $name)
{
    global $conn;

    $query = "UPDATE categories SET name = ? WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->bindValue(1, $name, PDO::PARAM_STR);
    $statement->bindParam(2, $categoryId, PDO::PARAM_INT);

    return $statement->execute();
}

