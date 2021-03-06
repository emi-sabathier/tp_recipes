<?php
namespace recipes\controller;
use recipes\model\RecipesManager;

class FrontController {

    public function listRecipes(){
        
        $recipesManager = new RecipesManager();
        $recipes = $recipesManager->getListRecipes(); 

        require 'view/listRecipesView.php';
        // on est tjs dans cette fonction avec la view
    }

    public function displayRecipe($idRecipe) {

        if ($_GET['idRecipe'] && $_GET['idRecipe'] > 0) {

            $recipesManager = new RecipesManager();
            $recipe = $recipesManager->getRecipe($idRecipe);
    
            require 'view/recipeView.php';

        } else {
            
            header('Location: index.php');
        }
    }
}