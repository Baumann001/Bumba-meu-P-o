 
 
 <form method="POST" action="update.php?id=<?php echo $row['id'];?>">

        <label for="name">Nome:</label>
        <input type="text" name="name" value="<?php echo $row['name'];?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $row['email'];?>" required>

        <input type="submit" value="Atualizar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>