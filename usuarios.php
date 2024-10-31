<?PHP
    include 'header.php';

    $acao = $_GET['acao'];
    $ver_id_usuario = $_GET['ver_id_usuario'];

    if ($user_ranking==1){
        echo "<div class='top-menu'><button><a href='usuarios.php?acao=novo'>Novo Usuário</a></button></div>";
    }

    $sql = "SELECT * FROM usuarios";
    $resultado = mysqli_query($conn, $sql);
    $linhas = mysqli_num_rows($resultado);

    echo "<div class='content'>
        <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ranking</th>
                <th>Ultimo acesso</th>
                <th>Editar</th>
            </tr>";

    for ($i = 0; $i < $linhas; $i++) {
        $registro = mysqli_fetch_array($resultado);
        $id_usuario = $registro['id_usuario'];
        $nome = $registro['nome'];
        $email = $registro['email'];
        $ranking = $registro['ranking'];
        $ultimo_acesso = $registro['ultimo_acesso'];

        $ultimo_acesso = date('d/m/Y - H:i', strtotime($ultimo_acesso));

        if ($ranking == 1) {
            $ver_ranking = "Admin";
        } elseif ($ranking == 2) {
            $ver_ranking = "Operador";
        } elseif ($ranking == 3) {
            $ver_ranking = "Cliente";
        } elseif ($ranking == 4) {
            $ver_ranking = "Key Account";
        } elseif ($ranking == 5) {
            $ver_ranking = "Estoquista";
        }

        if ($cor_fundo == "lightgray") {
            $cor_fundo = "white";
        } else {
            $cor_fundo = "lightgray";
        }

        echo "<tr style='background-color:$cor_fundo'>
                <td>$nome</td>
                <td>$email</td>
                <td>$ver_ranking</td>
                <td>$ultimo_acesso</td>
                <td><button><a href='usuarios.php?ver_id_usuario=$id_usuario&acao=editar'>Editar</a></button></td>
              </tr>";
    }
    
    echo "</table></div>";

    if ($acao == "editar" && $user_ranking == '1') {

        $sql_editar = "SELECT * FROM usuarios where id_usuario = $ver_id_usuario";
        $resultado_editar = mysqli_query($conn, $sql_editar);

        while($row_editar = $resultado_editar->fetch_assoc()) {
            $id_usuario = $row_editar['id_usuario'];
            $nome = $row_editar['nome'];
            $email = $row_editar['email'];
            $ranking = $row_editar['ranking'];
        }

        if ($ranking==1){ $r_admin='selected'; }
        elseif ($ranking==2){ $r_operador = 'selected'; }
        elseif ($ranking==3){ $r_cliente = 'selected'; }
        elseif ($ranking==4){ $r_key = 'selected'; }
        elseif ($ranking==5){ $r_estoquista = 'selected'; }

        echo "<div class='bloco_centro'>
                <div class='content'>
                <h2>Editar Usuário</h2>
                <form action='edita_usuario.php' method='post'>
                    <label>Informe o nome</label><input type='text' name='nome' id='nome' value='$nome' placeholder='Nome'>
                    <label>Informe a senha</label><input type='text' name='senha' id='senha' placeholder='senha'>
                    <label>Informe o email</label><input type='text' name='email' id='email' value='$email' placeholder='email'>
                    <label>Selecione o tipo</label><select name='ranking' id='ranking'>
                        <option value='1' $r_admin>Admin</option>
                        <option value='2' $r_operador>Operador</option>
                        <option value='3' $r_cliente>Cliente</option>
                        <option value='4' $r_key>Key Account</option>
                        <option value='5' $r_estoquista>Estoquista</option>
                    </select>
                    <input type='hidden' name='id_usuario' id='id_usuario' value='$id_usuario'>
                    <input type='submit' value='Salvar'>
                </form>
                </div>
            </div>";
    }

    if ($acao == "novo" && $user_ranking == '1') {
        echo "<div class='bloco_centro'>
            <div class='content'>
            <h2>Novo Usuário</h2>
            <form action='insere_usuario.php' method='post'>
                <label>Informe o nome</label><input type='text' name='nome' id='nome' placeholder='Nome do usuário (login)' required>
                <label>Informe a senha</label><input type='text' name='senha' id='senha' placeholder='Senha' required>
                <label>Informe o email</label><input type='text' name='email' id='email' placeholder='Email'>
                <label>Selecione o tipo</label><select name='ranking' id='ranking'>
                    <option value='1'>Admin</option>
                    <option value='2'>Operador</option>
                    <option value='3' selected>Cliente</option>
                    <option value='4'>Key Account</option>
                    <option value='5'>Estoquista</option>
                </select>
                <input type='submit' value='Salvar'>
            </form>
            </div>
        </div>";
    }
?>