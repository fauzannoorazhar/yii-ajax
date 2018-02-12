<?php 

$this->title = "Frontend";

?>

<div class="row">
	<div class="col-sm-2">
	</div>

	<div class="col-sm-9">
		<div id="postList">
			<?php foreach (\app\models\Artikel::find()->limit(3)->all() as $data): ?>
				<div class="box box-default">
					<div class="box-body">
						<div class="post">
							<div class="user-block">
								<img class="img-circle img-bordered-sm" src="<?= Yii::$app->request->baseUrl .'/images/img.png'?>">
								<span class="username">
									<a href="#"><?= $data->judul.' - '.$data->id ?></a>
									<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
								</span>
								<span class="description">Shared publicly - 7:30 PM today</span>
							</div>
							<p>
								Lorem ipsum represents a long-held tradition for designers,
								typographers and the like. Some people hate it and argue for
								its demise, but others ignore the hate as they create awesome
								tools to help create filler text for everyone from bacon lovers
								to Charlie Sheen fans.
							</p>
							<ul class="list-inline">
								<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
								<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
								</li>
								<li class="pull-right">
								<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
								(5)</a></li>
							</ul>
		                 	<input class="form-control input-sm" type="text" placeholder="Type a comment">
		                </div>
					</div>
				</div>
			<?php endforeach ?>
			<div class="load-more-artikel" lastID="<?= $data->id ?>">
    			<div style="text-align: center">
					<img src="<?= Yii::$app->request->baseUrl.'/images/giphy.gif' ?>" style="width: 50px">
    			</div>
			</div>
		</div>
	</div>

	<div class="col-sm-1">
	</div>
</div>