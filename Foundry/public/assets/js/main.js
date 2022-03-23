/*******************************************************************************
 ********************************** VARIABLES ***********************************
 *******************************************************************************/
let stats = 28;
let basicStat = 10;
let character = {
  name: "",
  hp: 100,
  strength: 10,
  dexterity: 10,
  intelligence: 10,
  wisdom: 10,
  charism: 10,
  constitution: 10,
  race: 1,
  classe: 1,
};

let races = [
  {
    id: 1,
    name: "Human",
    img: "https://zupimages.net/up/22/02/smvk.png",
  },
  {
    id: 2,
    name: "Orc",
    img: "https://zupimages.net/up/22/02/tcxi.png",
  },
  {
    id: 3,
    name: "Dwarf",
    img: "https://zupimages.net/up/22/02/k3n0.png",
  },
  {
    id: 4,
    name: "Elf",
    img: "https://zupimages.net/up/22/02/dckt.png",
  },
  {
    id: 5,
    name: "Ghoul",
    img: "https://zupimages.net/up/22/02/6bwp.png",
  },
];

let classes = [
  {
    id: 1,
    name: "Barbarian",
    img: "https://zupimages.net/up/22/02/ya6l.png",
  },
  {
    id: 2,
    name: "Bard",
    img: "https://zupimages.net/up/22/02/557c.png",
  },
  {
    id: 3,
    name: "Cleric",
    img: "https://zupimages.net/up/22/02/g66l.png",
  },
  {
    id: 4,
    name: "Druid",
    img: "https://zupimages.net/up/22/02/edzt.png",
  },
  {
    id: 5,
    name: "Monk",
    img: "https://zupimages.net/up/22/02/owy4.png",
  },
  {
    id: 6,
    name: "Ranger",
    img: "https://zupimages.net/up/22/02/x1sh.png",
  },
  {
    id: 7,
    name: "Rogue",
    img: "https://zupimages.net/up/22/02/whar.png",
  },
  {
    id: 8,
    name: "Warlock",
    img: "https://zupimages.net/up/22/02/681n.png",
  },
  {
    id: 9,
    name: "Wizard",
    img: "https://zupimages.net/up/22/02/vxa1.png",
  },
];

/*******************************************************************************
 ******************************* FUNCTIONS **************************************
 *******************************************************************************/

function displayRacePanel() {
  configPanel = $("#configPanel");
  configPanel.empty();
  configPanel.append(`
  <h2 class="h2Race">Choisissez votre race :</h2>
    <section id="raceChoices" class="row racePanel">
      <aside class="column fullCenter sizeRace">
        <button id="humanBtn" class="ficheBtn" data-race="1">Humain</button>
        <button id="orcBtn" class="ficheBtn" data-race="2">Orc</button>
        <button id="dwarfBtn" class="ficheBtn" data-race="3">Nain</button>
        <button id="elfBtn" class="ficheBtn" data-race="4">Elfe</button>
        <button id="ghoulBtn" class="ficheBtn" data-race="5">Goule</button>
      </aside>
      <main>
        <img alt="race jeu fantasy" class="imgRaceJs" src="${races[character.race - 1].img}"></img>
      </main>
    </section>
     `);

  let raceChoicesBtns = $("#raceChoices aside button");

  raceChoicesBtns.each(function () {
    $(this).on("click", function () {
      character.race = $(this).data("race");
      displayRacePanel();
    });
  });
}

function displayClassePanel() {
  configPanel.empty();
  configPanel.append(`
  <h2 class="h2Race">Choisissez votre classe :</h2>
  <section id="classeChoices" class="row sectionRaceJS">
    <aside class="column fullCenter asideRaceJs">
      <button class="ficheBtn classBtnJs" data-classe="1">Barbare</button>
      <button class="ficheBtn classBtnJs" data-classe="2">Barde</button>
      <button class="ficheBtn classBtnJs" data-classe="3">Clerc</button>
      <button class="ficheBtn classBtnJs" data-classe="4">Druide</button>
      <button class="ficheBtn classBtnJs" data-classe="5">Moine</button>
      <button class="ficheBtn classBtnJs" data-classe="6">Archer</button>
      <button class="ficheBtn classBtnJs" data-classe="7">Roublard</button>
      <button class="ficheBtn classBtnJs" data-classe="8">Sorcier</button>
      <button class="ficheBtn classBtnJs" data-classe="9">Magicien</button>
    </aside>
      <img alt="classe fantasy jeu" class="imgClasseJs" src="${classes[character.classe - 1].img}"></img>
  </section>
     `);

  let classeChoicesBtns = $("#classeChoices aside button");

  classeChoicesBtns.each(function () {
    $(this).on("click", function () {
      character.classe = $(this).data("classe");
      displayClassePanel();
      // displayCharacterData();
    });
  });
}

function displayStatsPanel() {
  configPanel.empty();
  configPanel.append(`
  
<h2 class="h2Race center">Choisissez vos Stats :</h2>

<div class="contentStats">
  <div class="flex column fullCenter inputStatsJs">
    <label class="labelStats"><i class="ra ra-sword"></i>Pseudo :</label>
    <input
      type="text"
      id="nickname"
      class="inputFields"
      data-statname="nickname"
      value="${character.name}"
      placeholder="Pseudo..."
      required
    />
  </div>

  <div class="flex column fullCenter inputStatsJs">
    <label><i class="fas fa-fist-raised"></i> Force :</label>
    <p>Détermine vos dégats physiques</p>
    <input
      type="number"
      id="strength"
      step="1"
      class="inputFields"
      data-statname="strength"
      value="${character.strength}"
      required
      min="10"
      max="30"
    />
  </div>

  <div class="flex column fullCenter inputStatsJs">
    <label><i class="fas fa-running"></i> Dexterité :</label>
    <p>Détermine l'esquive et la furtivité</p>
    <input
      type="number"
      id="dexterity"
      step="1"
      class="inputFields"
      data-statname="dexterity"
      value="${character.dexterity}"
      required
      min="10"
      max="30"
    />
  </div>

  <div class="flex column fullCenter inputStatsJs">
    <label><i class="fas fa-brain"></i> Intelligence :</label>
    <p>Détermine vos dégats magiques</p>
    <input
      type="number"
      id="intelligence"
      step="1"
      class="inputFields"
      data-statname="intelligence"
      value="${character.intelligence}"
      required
      min="10"
      max="30"
    />
  </div>

  <div class="flex column fullCenter inputStatsJs">
    <label><i class="fas fa-tint"></i> Sagesse :</label>
    <p>Détermine la quantité de magie utilisable</p>
    <input
      type="number"
      id="wisdom"
      step="1"
      class="inputFields"
      data-statname="wisdom"
      value="${character.wisdom}"
      required
      min="10"
      max="30"
    />
  </div>

  <div class="flex column fullCenter inputStatsJs">
    <label><i class="fas fa-balance-scale"></i> Charisme :</label>
    <p>Détermine la force de persuation</p>
    <input
      type="number"
      id="charism"
      step="1"
      class="inputFields"
      data-statname="charism"
      value="${character.charism}"
      required
      min="10"
      max="30"
    />
  </div>

  <div class="flex column fullCenter inputStatsJs">
    <label><i class="fas fa-heart"></i> Constitution :</label>
    <p>Détermine votre robustesse</p>
    <input
      type="number"
      id="constitution"
      step="1"
      class="inputFields"
      data-statname="constitution"
      value="${character.constitution}"
      required
      min="10"
      max="30"
    />
  </div>
</div>
 
   `);

  // Affichage ligne html pour les stats
  document.querySelector("#hiddenOne").style.opacity = 1;

  let inputsStats = $(".inputFields");

  for (let i = 0; i < inputsStats.length; i++) {
    inputsStats[i].addEventListener("change", function () {
      // Récupération du nom de la stat à mettre à jour
      let statToChange = this.dataset.statname;

      // Pour chaque propriété associée à sa valeur dans {character}
      for (const [prop, val] of Object.entries(character)) {
        
        if (prop == statToChange) {
          var currentStatValue = character[prop];
          // Définition d'une variable pour la stat à MAJ (pour y accéder en dehors de la boucle)
          var characterStatToChange = prop;
          // MAJ de la valeur de la prop dans {character}
          character[prop] = this.value;
        }
      }
      // Comparaison ancienne && nouvelle valeure pour voir si elle à augmentée ou diminiuée
      if (currentStatValue < character[characterStatToChange]) {
        stats--;
      } else if (currentStatValue > character[characterStatToChange]) {
        stats++;
      }

      // MAJ points restant
      statLeftDisplay();

      for (let k = 0; k < inputsStats.length; k++) {
        let maxVal;
        // Si c'est un autre champs que celui qu'on vient de modifier ET si le nbr de pts restant à attribuer est inférieur à 10 ET supérieur à 0
        if (inputsStats[k].dataset.statname !== characterStatToChange && stats < 10 && stats > 0) {
          // la valeur max que peut prendre ces champs est la valeur actuelle du champs + le nbr de points restant à attribuer
          maxVal = character[inputsStats[k].dataset.statname] + stats;
          // On met à jour la valeur de l'attribut "max"
          inputsStats[k].setAttribute("max", maxVal);
        } else if (stats == 0) {
          // La valeur max est la valeur actuelle du champs
          maxVal = character[inputsStats[k].dataset.statname];
          // MAJ de la valeur de l'attribut "max" du champs
          inputsStats[k].setAttribute("max", maxVal);
        }
      }
    });
  }
}

// AFFICHAGE DE LA LIGNE DES STATS A ATTRIBUER
function statLeftDisplay() {
  number.innerText = stats;
}

function callData() {
  let formData = new FormData();
  let nickname = $("#nickname").val();
  let strength = parseInt($("#strength").val());
  let dexterity = parseInt($("#dexterity").val());
  let intelligence = parseInt($("#intelligence").val());
  let wisdom = parseInt($("#wisdom").val());
  let charism = parseInt($("#charism").val());
  let constitution = parseInt($("#constitution").val());
  let race = character.race;
  let classe = character.classe;

  formData.append("nickname", nickname);
  formData.append("hp", 100);
  formData.append("strength", strength);
  formData.append("dexterity", dexterity);
  formData.append("intelligence", intelligence);
  formData.append("wisdom", wisdom);
  formData.append("charism", charism);
  formData.append("constitution", constitution);
  formData.append("race", race);
  formData.append("classe", classe);

  persistCharacter(formData);
}

function persistCharacter(formData) {
  $.ajax({
    dataType: "json",
    type: "POST",
    url: "index.php?route=final_stats",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      let result = Object.values(data);
      window.location.href = `index.php?route=final_character&name=` + result[0];
    },
    error: function (error) {
      console.log(error);
    },
  });
}

/*******************************************************************************
 ******************************** MAIN CODE *************************************
 *******************************************************************************/
// DOM content loaded
$(function () {
  let raceBtn = $("#racePanelBtn");
  let classeBtn = $("#classePanelBtn");
  let statsBtn = $("#statsPanelBtn");
  let createBtn = $("#CreateCharacter");
  let configPanel;
  let number = $("#number");

  classeBtn.on("click", function () {
    displayClassePanel();
  });
  raceBtn.on("click", function () {
    displayRacePanel();
  });
  statsBtn.on("click", function () {
    displayStatsPanel();
    statLeftDisplay();
  });
  createBtn.on("click", function () {
    if (
      window.confirm(
        "Attention! Vous allez valider votre personnage et ne pourrez plus le modifier"
      )
    ) {
      callData();
    }
  });

  displayRacePanel();

  // AFFICHAGE CONFIRM DELETE
  const deleteBtns = document.querySelectorAll(".deleteBtn");

  for (let i = 0; i < deleteBtns.length; i++) {
    deleteBtns[i].addEventListener("click", function () {
      if (window.confirm("Etes vous sûr de vouloir supprimer l'utilisateur ?")) {
        let userId = this.dataset.id;
        window.location.href = "index.php?route=delete_user&id=" + userId;
      }
    });
  }
  
  // DELETE CHARACTER
  const deleteChar = document.querySelectorAll(".deleteChar");

  for (let i = 0; i < deleteChar.length; i++) {
    deleteChar[i].addEventListener("click", function () {
      if (window.confirm("Etes vous sûr de vouloir supprimer le personnage ?")) {
        let charId = this.dataset.idChar;
        window.location.href = "index.php?route=delete_character&id=" + charId;
      }
    });
  }
  
});
