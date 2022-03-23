<div class="flex column">
  <a title="Retour page précédente" class="return" href="index.php?route=credentials&sessionKey=<?= $_SESSION['sessionKey'] ?>&fromUpdate">Retour</a> 
  <a title="Modifier le compte" class="return" href="index.php?route=credential_update&id=<?= $user['id'] ?>&fromUpdate">Modifier mon compte</a> 
</div>

<div class="flex flexForm fullCenter">
  <form method="POST" action="" class="form">
    <?php if( isset( $_GET['error'] ) ) : ?>
    <p class="error"><?= $_GET['error'] ?></p>
    <?php endif; ?>
    <h2 class="title"><?= htmlspecialchars($character['name']) ?></h2>

    <div class="input-container ic2 margin1 margin2">
      <input
        id="nameUp"
        name="name"
        class="input input2 input3"
        type="text"
        value="<?= htmlspecialchars($character['name']) ?>"
        readonly
      />
      <div class="cut"></div>
      <label for="nameUp" class="placeholder">Pseudo</label>
    </div>

    <div class="input-container ic2 margin1 margin2">
      <input
        id="hpUp"
        name="hp"
        class="input input2 input3"
        type="text"
        value="<?= htmlspecialchars($character['hp']) ?>"
        readonly
      />
      <div class="cut"></div>
      <label for="hpUp" class="placeholder">Point de vie</label>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input
          id="raceUp"
          name="race"
          class="input input2"
          type="text"
          value="<?= htmlspecialchars($race['name']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="raceUp" class="placeholder">Race</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="classeUp"
          name="classe"
          class="input input2"
          type="text"
          min="0"
          value="<?= htmlspecialchars($classe['name']) ?>"
          readonly
        />
        <div class="cut cut-short"></div>
        <label for="classeUp" class="placeholder">Classe</label>
      </div>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input
          id="strengthUp"
          name="strength"
          class="input input2"
          type="text"
          value="<?= htmlspecialchars($character['strength']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="strengthUp" class="placeholder">Force</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="dexterityUp"
          name="dexterity"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['dexterity']) ?>"
          readonly
        />
        <div class="cut cut-short"></div>
        <label for="dexterityUp" class="placeholder">Dextérité</label>
      </div>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input id ="IntelligenceUp" name=intelligence"" class="input input2" type="number" min=0 value="<?= htmlspecialchars($character['intelligence']) ?>"readonly/>
        <div class="cut"></div>
        <label for="IntelligenceUp" class="placeholder">Intelligence</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="wisdomUp"
          name="wisdom"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['wisdom']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="wisdomUp" class="placeholder">Sagesse</label>
      </div>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input
          id="charismUp"
          name="charism"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['charism']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="charismUp" class="placeholder">Charisme</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="constitutionUp"
          name="constitution"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['constitution']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="constitutionUp" class="placeholder">Constitution</label>
      </div>
    </div>
  </form>
</div>