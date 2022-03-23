<?php if( isset( $_SESSION['role'] ) ) : ?>
<div class="flex flexForm fullCenter">
  <form method="POST" action="" class="form">
    <?php if( isset( $_GET['error'] ) ) : ?>
    <p class="error"><?= $_GET['error'] ?></p>
    <?php endif; ?>
    <h2 class="title">Création réussie !</h2>

    <div class="input-container ic2 margin1 margin2">
      <input
        id="nameChar"
        name="name"
        class="input input2 input3"
        type="text"
        value="<?= htmlspecialchars($character['name']) ?>"
        readonly
      />
      <div class="cut"></div>
      <label for="nameChar" class="placeholder">Nom</label>
    </div>

    <div class="input-container ic2 margin1 margin2">
      <input
        id="hpChar"
        name="hp"
        class="input input2 input3"
        type="text"
        value="<?= htmlspecialchars($character['hp']) ?>"
        readonly
      />
      <div class="cut"></div>
      <label for="hpChar" class="placeholder">Point de vie</label>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input
          id="raceChar"
          name="race"
          class="input input2"
          type="text"
          value="<?= htmlspecialchars($race['name']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="raceChar" class="placeholder">Race</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="classeChar"
          name="classe"
          class="input input2"
          type="text"
          min="0"
          value="<?= htmlspecialchars($classe['name']) ?>"
          readonly
        />
        <div class="cut cut-short"></div>
        <label for="classeChar" class="placeholder">Classe</label>
      </div>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input
          id="strengthChar"
          name="strength"
          class="input input2"
          type="text"
          value="<?= htmlspecialchars($character['strength']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="strengthChar" class="placeholder">Force</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="dexterityChar"
          name="dexterity"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['dexterity']) ?>"
          readonly
        />
        <div class="cut cut-short"></div>
        <label for="dexterityChar" class="placeholder">Dextérité</label>
      </div>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input
          id="intelligenceChar"
          name="intelligence"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['intelligence']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="intelligenceChar" class="placeholder">Intelligence</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="wisdomChar"
          name="wisdom"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['wisdom']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="wisdomChar" class="placeholder">Sagesse</label>
      </div>
    </div>

    <div class="flex">
      <div class="input-container ic2 margin1">
        <input
          id="charismChar"
          name="charism"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['charism']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="charismChar" class="placeholder">Charisme</label>
      </div>

      <div class="input-container ic2 margin1">
        <input
          id="constitutionChar"
          name="constitution"
          class="input input2"
          type="number"
          min="0"
          value="<?= htmlspecialchars($character['constitution']) ?>"
          readonly
        />
        <div class="cut"></div>
        <label for="constitutionChar" class="placeholder">Constitution</label>
      </div>
    </div>
  </form>
</div>
<?php endif; ?>
