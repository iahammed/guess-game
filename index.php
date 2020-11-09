
<html>
    <body>
        <h1>Hi Welcome to Guessing Game</h1>
            <hr />
        <h4>Please enter max value if it is number</h4>
        <form action="guess.php" method="POST"><br />
            <hr />
            <div>
                <input type="radio" name="type" value="number"
                    checked>
                    <label>Number</label>
                    <div>
                        <label>Max Value</label>
                        <input type="text" name="max">
                    </div>
            </div>
            <hr />
            <div>
                <input type="radio" name="type" value="letter">
                <label>letter</label>
                
            </div>
            <hr />
            <div>
                <input type="submit" value="Start Game">
            </div>

        </form>
    </body>
</html>