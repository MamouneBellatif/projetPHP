<?php

    require_once("../model/Categorie.class.php");
    require_once("../model/Article.class.php");

    // Creation de l'unique objet DAO
    $dao = new DAO();

    // Le Data Access Object
    // Il représente la base de donnée
    class DAO {
        // L'objet local PDO de la base de donnée
        private $db;

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            try {
              $this->db = new PDO('sqlite:../data/db/lamoucherie.db'); //ne marche pas
            }
            catch (PDOException $e){
              die("erreur de connexion:".$e->getMessage());
            }
        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {
            $catPere = "SELECT * FROM categorie WHERE id=pere";
            $descripteur = $this->db->query($catPere);
            $resCatPere = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Categorie');
            $resultat = array();
            foreach ($resCatPere as $key => $value) {
              $sousCatPere = "SELECT * FROM categorie WHERE pere=$value->id AND id!=pere";
              $descripteur = $this->db->query($sousCatPere);
              $resSousCatPere = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Categorie');
              array_unshift($resSousCatPere, $value);
              //var_dump($resSousCatPere);
              $resultat[] = $resSousCatPere;
            }
            return $resultat;
        }



        // Accès aux n premiers articles
        // Cette méthode retourne un tableau contenant les n permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN(int $n, int $cat) : array {
            if ($cat==0)
              $req = "SELECT * FROM article LIMIT $n";
            else
              $req = "SELECT * FROM article WHERE categorie=$cat LIMIT $n";

            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        // Acces au n articles à partir de la reférence $ref
        // Cette méthode retourne un tableau contenant n  articles de
        // la base sous la forme d'objets de la classe Article.
        function getN(int $ref,int $n, int $cat) : array {
            if ($cat==0)
              $req = "SELECT * FROM (select * from article order by ref) WHERE ref >=$ref LIMIT $n";
            else
              $req = "SELECT * FROM (select * from article order by ref) WHERE ref >=$ref AND categorie=$cat LIMIT $n";

            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        // Acces à la référence qui suit la référence $ref dans l'ordre des références
        function next(int $ref) : int {
            $req = "SELECT * FROM (select * from article order by ref) WHERE ref > $ref LIMIT 1";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result[0]->ref;
        }

        // Acces aux n articles qui précèdent de $n la référence $ref dans l'ordre des références
        function prevN(int $ref,int $n): array {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////
            $req = "SELECT * FROM (select * from article order by ref desc) WHERE ref <$ref LIMIT $n";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return array_reverse($result);
        }

        // Acces à une catégorie
        // Retourne un objet de la classe Categorie connaissant son identifiant
        function getCat(int $id): Categorie {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////////////

            return new Categorie();
        }




        // Acces au n articles à partir de la reférence $ref
        // Retourne une table d'objets de la classe Article
        function getNCateg(int $ref,int $n,string $categorie) : array {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////////////
            return array();
        }

    }

    ?>
