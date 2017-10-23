<div class="container-auth">
    <form method="post" action="handler.php">
        <div class="input-group">
            <label for="email">Email-adres</label>
            <input type="text" name="email"/>
        </div>
        <div class="input-group">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password"/>
        </div>
        <div class="input-group">
            <label for="frontname">Voornaam</label>
            <input type="text" name="frontname"/>
        </div>
        <div class="input-group">
            <label for="backname">Achternaam</label>
            <input type="text" name="backname"/>
        </div>
        <div class="input-group">
            <label for="dob">Geboorte datum</label>
            <input type="date" name="dob"/>
        </div>
        <div class="input-group">
            <label for="submit"></label>
            <input type="hidden" name="target" value="register">
            <input type="submit" value="registreren"/>
        </div>
    </form>
        <div class="input-group">
            <form action="index.php" method="post" class="login">
                <p style="text-align: center">Heeft u al een account?</p>
                <input type="hidden" name="login" value="1">
                <input type="submit" value="inloggen?"/>
            </form>
        </div>
</div>
<!-- made by Menno & Tycho -->