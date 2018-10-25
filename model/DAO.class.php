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

        function estUneCatPere(int $cat) : int {
          $req = "SELECT id FROM categorie WHERE id=$cat AND pere=id";
          $descripteur = $this->db->query($req);
          $estUneCatPere = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
          return sizeof($estUneCatPere);
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
              $resultat[] = $resSousCatPere;
            }
            return $resultat;
        }



        // Accès aux 9 premiers articles
        // Cette méthode retourne un tableau contenant les 9 permier articles de
        // la base sous la forme d'objets de la classe Article.
        function firstN( int $cat) : array {
            if ($cat==0){
              $req = "SELECT * FROM article LIMIT 9";
            }else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM article WHERE categorie IN (select id FROM categorie WHERE pere=$cat) LIMIT 9";
              }else{
                $req = "SELECT * FROM article WHERE categorie=$cat LIMIT 9";
              }
            }

            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        function getNbArticle(int $cat) : int {
            if ($cat==0){
              $req = "SELECT * FROM article";
            }else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM (select * from article order by ref) WHERE  categorie IN (select id FROM categorie WHERE pere=$cat)";
              }else{
                $req = "SELECT * FROM (select * from article order by ref) WHERE categorie=$cat";
              }
             }
            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');

            return sizeof($result);
        }

        // Accès aux 9 articles suivant le derniers affiché
        // Cette méthode retourne un tableau contenant les 9 articles, suivant le derniers affiché, de
        // la base sous la forme d'objets de la classe Article.
        function next(int $ref, int $cat) : array {
            if ($cat==0)
              $req = "SELECT * FROM (select * from article order by ref) WHERE ref >$ref LIMIT 9";
            else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM (select * from article order by ref) WHERE ref >$ref AND categorie IN (select id FROM categorie WHERE pere=$cat) LIMIT 9";
              }else{
                $req = "SELECT * FROM (select * from article order by ref) WHERE ref >$ref AND categorie=$cat LIMIT 9";
              }
            }


            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }

        // Accès aux 9 articles précédents le derniers affiché
        // Cette méthode retourne un tableau contenant les 9 articles, précédents le derniers affiché, de
        // la base sous la forme d'objets de la classe Article.
        function prec(int $ref, int $cat): array {
            if ($cat==0)
              $req = "SELECT * FROM (select * from article order by ref) WHERE ref <$ref LIMIT 9";
            else{
              if ($this->estUneCatPere($cat)==1){
                $req = "SELECT * FROM (select * from article order by ref) WHERE ref <$ref AND categorie IN (select id FROM categorie WHERE pere=$cat) LIMIT 9";
              }else{
                $req = "SELECT * FROM (select * from article order by ref) WHERE ref <$ref AND categorie=$cat LIMIT 9";
              }
            }


            $descripteur = $this->db->query($req);
            $result = $descripteur->fetchAll(PDO::FETCH_CLASS, 'Article');
            return $result;
        }
    }

    ?>
