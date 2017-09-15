<?php include_once('superior.php');?>

<div class="content">
    <div class="container-fluid" >
        <!-- Perfil -->
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        <img src="assets/img/background.jpg" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                          <img class="avatar border-white" src="assets/img/faces/beards.png" alt="..."/>
                          <h4 class="title">Alex Santos<br />
                             <a href="#"><small>Alex</small></a>
                         </h4>
                     </div>
                     <p class="description text-center">
                        SM
                        <br>
                        Dev
                    </p>
                </div>
                <hr>

            </div>

            <!--  -->

            <!-- CHAT -->
            <div class="card">
                <div class="header">
                    <h4 class="title">Chat</h4>
                </div>
                <div class="content">
                    <ul class="list-unstyled team-members">
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="assets/img/faces/face-0.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    Diego
                                    <br />
                                    <span class="text-muted"><small>Offline</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="assets/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    Gustavo
                                    <br />
                                    <span class="text-success"><small>Disponível</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="avatar">
                                        <img src="assets/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    Gabriel
                                    <br />
                                    <span class="text-danger"><small>Ocupado</small></span>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  -->

        <!-- Perfil Cadastro -->
        <div class="col-lg-8 col-md-7" style="height: 420px">
            <div class="card" style="height: 100%;"">
                <div class="header">
                    <h4 class="title">Editar Perfil</h4>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Grupo</label>
                                    <input type="text" class="form-control border-input" disabled placeholder="Company" value="Beards Web">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Login</label>
                                    <input type="text" class="form-control border-input" placeholder="Username" value="beardsmaster">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Senha</label>
                                    <input type="email" class="form-control border-input" placeholder="****">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control border-input" placeholder="Company" value="Alex">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control border-input" placeholder="Home Address" value="alex@beardsweb.com.br">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" class="form-control border-input" placeholder="City" value="(11) 66666-6666">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Permissão</label>
                                    <input type="text" disabled class="form-control border-input" value="Administrador" >
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="text-center">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Atualizar
                            <br>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Administrador -->

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Administrador</h4>
                    </div>
                    <div class="content">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Empresa</label>
                                        <input type="text" class="form-control border-input" disabled placeholder="Company" value="Beards Web">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Usuario</label>
                                        <input type="text" class="form-control border-input" placeholder="Username" value="Alex">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Senha</label>
                                        <input type="email" class="form-control border-input" placeholder="****">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control border-input" placeholder="Company" value="Alex">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control border-input" placeholder="Last Name" value="Santos">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control border-input" placeholder="Home Address" value="alex@beardsweb.com.br">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <input type="text" class="form-control border-input" placeholder="City" value="SM">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Função</label>
                                        <input type="text" class="form-control border-input" placeholder="Country" value="Dev">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data de Nascimento</label>
                                        <input type="number" class="form-control border-input" placeholder="19/01/1993">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Permissão</label>
                                        <input type="number" class="form-control border-input" placeholder="Administrador">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Atualizar</button>
                        </div>
                        <br>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>



    </div>


    <?php include_once('inferior.php');?>