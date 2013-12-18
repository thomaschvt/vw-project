<?php
namespace VintageWest\AdminBundle\Services;
class ImgUploader
{
    protected $em = null;
    protected $entity = null;
    protected $form = null;
    protected $folder_name = null;
    protected $img = "";
    function init($_em, $_entity, $_form, $_folder_name){
        $this->em = $_em;
        $this->entity = $_entity;
        $this->form = $_form;
        $this->folder_name = $_folder_name;
    }
    function upload(){// (tableau des images à rechercher, tableau source)

        $this->em->persist($this->entity);
        $this->em->flush();

        //upload d'img
        //on définit le dossier ou envoyer les images
        $dir = "img/".$this->folder_name;

        //on recupère le nom original du fichier
        $nomBase = $this->form['imgUrl']->getData()->getClientOriginalName();
        //on découpe le nom du fichier pr recup l'extension
        $extension=strrchr($nomBase,'.');
        $extension=substr($extension,1) ;
        //on génère le nouveau nom du fichier
        $randNom = rand(0,1000000);
        $dateNom = time();
        $NewNom = 'img_'.$randNom.$dateNom.'.'.$extension;
        //chemin a stocker pour récupère l'image
        $pathImg = 'img/'.$this->folder_name.'/'.$NewNom;
        //upload de l'image avec son nouveau nom
        $this->form['imgUrl']->getData()->move($dir, $NewNom);

        $this->entity->setImgUrl($NewNom);
        $this->em->persist($this->entity);
        $this->em->flush();

        return $this->entity;
        //return $this->redirect($this->generateUrl('prestations_show', array('id' => $entity->getId())));
    }
}