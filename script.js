$(document).ready(function(){
  function strUcFirst(a){
    return (a+'').charAt(0).toUpperCase()+a.substr(1);
  }

    //Lorsqu'une touche est pressée dans la barre de recherche
    $("input").keypress(function(){

      $.post(
        //Page vers laquelle est envoyée la requête
        'autocomplete.php',
        {
          //Récupération des inputs du formulaires
          search : $("input").val(),
        },
  
        function(data){
          var oiseaux = JSON.parse(data);
          search=($("input").val());
          search=strUcFirst(search);
          var propositions=[];

          oiseaux.forEach(oiseau => {
            if(oiseau.startsWith(search)==true)
            {
              var key=oiseaux.indexOf(oiseau);
              propositions[key] = oiseau;
            }
          });

          //Affichage des propositions
          var liste_propositions = document.getElementById('liste');

          if(($("input")).innerHTML=="")
          { 
            return;
          } 
          else
          { 
            //On vide la liste des propositions précédentes
            liste_propositions.innerHTML = "";

            //Ajout des options en dessous de l'input

            //On initialise le compteur
            i=1;

            //On parcourt toutes les propositions
            propositions.forEach(function(item)
            {
              //On limite le nombre de propositions à 5
              if(i<=5)
              {
                //On créé un nouvel élément <option>
                var option = document.createElement('option');
                option.value = item;
                //On ajoute l'option à la liste des propositions
                liste.appendChild(option);
                i++;
              }
            });

            window.hinterXHR.open("GET", "recherche.php?search=" + $("#search").val(), true);
            window.hinterXHR.send();
          }
        
       
      });
  });
});




