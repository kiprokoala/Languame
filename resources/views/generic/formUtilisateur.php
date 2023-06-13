<div class="bodyContainer">
  <div id="formSigningContainer">
    <div id="titleSigninWelcome">
      <div id="welcome">Bienvenue !</div>
      <div id="welcomeSub">
        Veuillez vous connecter ou vous inscrire si vous n'avez pas de compte.
      </div>
    </div>
    <div id="containerSigninForms">
      <form action="connecting" method="POST" id="formSignIn">
        <div>
          <div class="titleFormSign">Connexion</div>

          <div class="blockInputsForm">
            <div>
              <label class="titleChamps" for="login">Login</label>
              <input type="text" name="login" />
            </div>
            <div>
              <label class="titleChamps" for="password">Mot de passe</label>
              <input type="password" name="password" />
            </div>
          </div>
        </div>
        <input type="submit" class="validerBtnSign" value="Se connecter" />
      </form>
      <form action="subscribing" method="POST" id="formSignUp">
        <div>
          <div class="titleFormSign">Inscription</div>
          <div class="blockInputsForm">
            <div style="display: flex; flex-direction: row; padding-bottom: 0">
              <div>
                <label class="titleChamps" for="login">Login</label>
                <input type="text" name="login" required />
              </div>
              <div style="padding-left: 15px">
                <label class="titleChamps" for="password">Mot de passe</label>
                <input type="password" name="password" required />
              </div>
            </div>
            <div style="display: flex; flex-direction: row; padding-bottom: 0">
              <div>
                <label class="titleChamps" for="prenom">Prénom</label>
                <input type="text" name="prenom" required />
              </div>
              <div style="padding-left: 15px">
                <label class="titleChamps" for="nom">Nom</label>
                <input type="text" name="nom" required />
              </div>
            </div>
            <div style="display: flex; flex-direction: row; padding-bottom: 0">
              <div>
                <label class="titleChamps" for="email">E-mail</label>
                <input type="email" name="email" required />
              </div>
              <div style="padding-left: 15px">
                <label class="titleChamps" for="id_langue">Numéro de langue</label>
                <input type="number" name="id_langue" required />
              </div>
            </div>
          </div>
        </div>
        <input type="submit" class="validerBtnSign" value="S'inscrire" />
      </form>
    </div>
  </div>
</div>
