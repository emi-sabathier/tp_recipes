<?php

namespace recipes\model;

class RecipesManager extends Manager 
{

    public function getListRecipes() {

        $db = $this->dbconnect(); // this.dbConnect()
        $q = $db->query('SELECT id, title, author, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i:%s\') AS date_fr FROM recipes ORDER BY date_creation DESC');
        $recipes = $q->fetchAll();
        
        return $recipes;
    }

    public function getRecipe($idRecipe) {

        $db = $this->dbConnect();
        $q = $db->prepare('SELECT id, title, author, content, DATE_FORMAT(date_creation, \'%d/%m/%Y %H:%i:%s\') AS date_fr FROM recipes WHERE id = ?');
        $q->execute(array($idRecipe));
        $recipe = $q->fetch(); 

        return $recipe;
    }
}



