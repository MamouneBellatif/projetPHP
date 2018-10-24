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
        // Le type, le chemin et le nom de la base de donnée
        private $database = 'sqlite:../data/db/bricomachin.db';

        // Constructeur chargé d'ouvrir la BD
        function __construct() {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////
            try {
              $this->db = new PDO('sqlite:../data/db/bricomachin.db'); //ne marche pas
            }
            catch (PDOException $e){
              die("erreur de connexion:".$e->getMessage());
            }
        }


        // Accès à toutes les catégories
        // Retourne une table d'objets de type Categorie
        function getAllCat() : array {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////////////
            $req = "SELECT * FROM categorie";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Categorie');
            return $result;
        }



        // Accès aux n premiers articles
        // Cette méthode retourne un tableau contenant les n permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN(int $n) : array {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////
            $req = "SELECT * FROM article LIMIT $n";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        // Acces au n articles à partir de la reférence $ref
        // Cette méthode retourne un tableau contenant n  articles de
        // la base sous la forme d'objets de la classe Article.
        function getN(int $ref,int $n) : array {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////
            $req = "SELECT * FROM (select * from article order by ref) WHERE ref >=$ref LIMIT $n";
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        // Acces à la référence qui suit la référence $ref dans l'ordre des références
        function next(int $ref) : int {
            ///////////////////////////////////////////////////////
            //  A COMPLETER
            ///////////////////////////////////////////////
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
