<?php
require_once 'Database.php';
/**
 * Description of Cars
 *
 * @author ken
 */
class Cars extends Database
{
    /*
     *  @param array
     *  Ajoute une voiture.
     *  @return bool; TRUE = REQUEST SUCESS, FALSE = REQUEST FAIL
     */
    public function add_cars(array $parametre)
    {
        $prepare = $this->connect();
        $add = $prepare->prepare('INSERT INTO voitures VALUE (NULL, :marque, :model, :prix, :description, :garantie, :nbchevaux, :km, :couleur, :type, :carburant, :annee, :slug, :photo)');
        $add->bindValue('marque', $parametre['marque'], PDO::PARAM_STR);
        $add->bindValue('model', $parametre['model'], PDO::PARAM_STR);
        $add->bindValue('prix', $parametre['prix'], PDO::PARAM_INT);
        $add->bindValue('description', $parametre['desc'], PDO::PARAM_STR);
        $add->bindValue('garantie', $parametre['garantie'], PDO::PARAM_INT);
        $add->bindValue('nbchevaux', $parametre['nbchevaux'], PDO::PARAM_INT);
        $add->bindValue('km', $parametre['km'], PDO::PARAM_INT);
        $add->bindValue('couleur', $parametre['couleur'], PDO::PARAM_STR);
        $add->bindValue('type', $parametre['type'], PDO::PARAM_STR);
        $add->bindValue('carburant', $parametre['carburant'], PDO::PARAM_INT);
        $add->bindValue('annee', $parametre['annee'], PDO::PARAM_INT);
        $add->bindValue('slug', $parametre['slug'], PDO::PARAM_STR);
        $add->bindValue('photo', $parametre['img'], PDO::PARAM_STR);
        $this->is_ok($add);
    }

    /*
     * @param int
     * recupére l'id et supprime l'élement selectionné
     */
    public function remove_cars($id)
    {
        $prepare = Self::connect();
        $remove = $prepare->prepare('DELETE FROM voitures WHERE id=:id');
        $remove->execute(array(':id' => $id));
    }

    public function update_cars(array $parametre) {
        $prepare = $this->connect();
        $add = $prepare->prepare('UPDATE voitures SET marque = :marque, model = :model, prix = :prix, description = :description, garantie = :garantie, nbchevaux = :nbchevaux, km = :km, couleur =:couleur, type = :type, carburant = :carburant, annee = :annee, photo = :photo WHERE slug="'.$parametre["slug"].'"');
        $add->bindValue(':marque', $parametre['marque'], PDO::PARAM_STR);
        $add->bindValue(':model', $parametre['model'], PDO::PARAM_STR);
        $add->bindValue(':prix', $parametre['prix'], PDO::PARAM_INT);
        $add->bindValue(':description', $parametre['desc'], PDO::PARAM_STR);
        $add->bindValue(':garantie', $parametre['garantie'], PDO::PARAM_INT);
        $add->bindValue(':nbchevaux', $parametre['nbchevaux'], PDO::PARAM_INT);
        $add->bindValue(':km', $parametre['km'], PDO::PARAM_INT);
        $add->bindValue(':couleur', $parametre['couleur'], PDO::PARAM_STR);
        $add->bindValue(':type', $parametre['type'], PDO::PARAM_STR);
        $add->bindValue(':carburant', $parametre['carburant'], PDO::PARAM_INT);
        $add->bindValue(':annee', $parametre['annee'], PDO::PARAM_INT);
        $add->bindValue(':photo', $parametre['img'], PDO::PARAM_STR);   
        $this->is_ok($add);
    }
    /*
     * @param string
     * Preparation de la requéte SQL pour afficher les resultats en fonction de la recherche
     */
    private function facile_affich($phrase)
    {
        $prepare = $this->connect();
        $show = $prepare->prepare($phrase);
        $show->execute();
        $allvoitures = $show->fetchAll(PDO::FETCH_CLASS);

        return $allvoitures;
    }
    /*
     * @param array
     * function à appelé pour afficher les resultats en fonction de la recherche
     * @return object
     */
    public function show_cars(array $parametre = [])
    {
        $phrase = 'SELECT * FROM voitures';
        if ($parametre == NULL) {
            $allvoitures = $this->facile_affich($phrase);

            return $allvoitures;
        } elseif (count($parametre) > 0) {
            $phrase = 'SELECT * FROM voitures WHERE ';
            $part = [];
            foreach ($parametre as $columns => $donnees) {
                if ($columns == "id_cars"){
                  $part_phrase = 'id IN ('.$donnees.')';
                  $phrase = $phrase . $part_phrase;  
                  $allvoitures = $this->facile_affich($phrase);
                  return $allvoitures;
                }
                if($columns == 'id'){
                    $part['request_marque'] = "id = '$donnees'";
                }
                if ($columns == 'slug') {
                    $part['request_marque'] = "slug = '$donnees'";
                }
                if ($columns == 'marque') {
                    $part['request_marque'] = "marque = '$donnees'";
                }
                if ($columns == 'km') {
                    $part['request_km'] = "km < '$donnees'";
                }
                if ($columns == 'couleur') {
                    $part['request_couleur'] = "couleur = '$donnees'";
                }
                if ($columns == 'carbu') {
                    $part['request_carbu'] = "carbu = '$donnees'";
                }
            }
            $partie_phrase = implode($part, " AND ");
            $phrase = $phrase . $partie_phrase;
            $allvoitures = $this->facile_affich($phrase);
            return $allvoitures;
        }
    }


}
