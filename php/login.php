<div class="container-auth">
    <form method="post" action="handler.php">
        <div class="input-group">
            <label for="email">Email-adres</label>
            <input type="email" name="email"/>
        </div>
        <div class="input-group">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password"/>
        </div>
        <div class="input-group">
            <label></label>
            <input type="hidden" name="target" value="login">
            <input type="submit" value="inloggen">
        </div>
    </form>
</div>
<!-- made by Menno & Tycho  -->