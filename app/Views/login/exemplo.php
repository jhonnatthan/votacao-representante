<div class="container-fluid h-100">
    
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-5 col-xs-12 p-5 m-1 mb-4 bg-white rounded shadow-md animated fadeInLeft">
            <p class="h2 text-primary text-center">Entrar</p>
            <form class="mt-3" id="frmlog">
                <div class="form-group">
                    <input type="text" name="login" class="form-control" placeholder="Login" maxlength="50" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" placeholder="Senha" maxlength="50" required>
                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option value="4">Aluno</option>
                        <option value="3">Orientador</option>
                        <option value="2">Coordenador</option>
                        <option value="1">Instituição</option>
                    </select>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar <i class="fa fa-check" aria-hidden="true"></i></button>
            </form>
            <a href="/facebook" class="btn btn-lg btn-primary btn-block mt-2" type="button">Logar com <i class="fa fa-facebook"></i></a>
        </div>
        <div class="col-md-4 col-xs-12 p-5 m-1 mb-4 bg-white text-primary rounded align-self-center shadow-md animated fadeInRight">
            <p class="h2 text-center mb-4">Precisa de ajuda <i class="fa fa-question"></i></p>
            <button class="btn btn-md btn-primary btn-block mt-2" type="button" id="solicitarAcesso">Solicitar acesso <i class="fa fa-user-plus" aria-hidden="true"></i></button>
            <button class="btn btn-md btn-primary btn-block mt-2" type="button" >Reportar erro <i class="fa fa-bug" aria-hidden="true"></i></button>
        </div>
    </div>
</div>