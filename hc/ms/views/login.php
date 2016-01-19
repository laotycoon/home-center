		<!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text col-xs-4">
                            <h1><strong>标题</strong></h1>
                            <div class="description">
                            	<p>Welcome！</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>网站登录</h3>
                            		<p>请输入您的用户名与密码:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom"><!-- index.php/userLogin/login -->
			                    <form role="form" action="index.php/controller/login" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="USERNAME" placeholder="用户名" class="form-username form-control" id="form-username" required="required">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="PASSWORD" placeholder="密码" class="form-password form-control" id="form-password" required="required">
			                        </div>
			                        <button type="submit" class="btn">登陆</button>
			                    </form>
		                    </div>
		                    <div class="form-message">
		                    	<p><?php if(!empty($_SESSION['_ERROR_MESSAGE_']))echo $_SESSION['_ERROR_MESSAGE_'];$_SESSION['_ERROR_MESSAGE_']="";?></p>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
