<style>
	#page {
		display: block !important;
		height: auto;

	}
	#socfooter {

		margin-top: 30vh;
	}
	.pdf{
		background-image: url("<?=base_url()?>img/pdf.png");
		width: 45px;
		margin-top: 6px;
		height: 25px;
		display: inline-block;
		float: left;
		margin-right:15px;
	}
	.op05{
		opacity: .5;
	}
	.file_name{
		font-weight: bold;
		font-size: 20px;
		line-height: 145%;
		/* identical to box height, or 29px */
		float: left;
		letter-spacing: 0.01em;
		display: inline-block;

		/* black */
		border-bottom: 2px solid  #141414;
		color: #141414;
		text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
	}
	.files{
		margin-top: 5px;
		margin-left: 40px;

		height: 45px;
	}
	@media  (min-width: 900px) {


	.top{
		background-color: #F8F8F8;
		width: 100%;
		padding:90px  130px 0px 130px;
	}
	.center{
		padding:50px  130px 0px 130px;
	}
	.bread{
		padding-bottom: 30px;
	}
	.header{
		font-size: 64px;
		color: #141414;
		font-weight:700;
	}
	.tabs{
		color: #141414;
		padding-top: 50px;
	}
	.tab_item{

		font-weight: 800;
		padding-bottom: 5px;
		margin-right:50px;
		cursor: pointer;
	}
	.ta{
		border-bottom: 2px solid #141414;
	}
	.bread_item, .tab_item{
		display: inline-block;
	}
	.photo img{
		width: 120px;
	}
	.photo{
		width: 120px;
		height: 120px;
		border-radius:100px ;
		overflow: hidden;
		background-size: cover;
		background-position: center;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		text-align: center;
		margin: auto;

	}
	.people{
		width: 265px;
		height: 265px;
		display: inline-block;
		text-align: center;
	margin-bottom: 10px
	}
	.name{
		color: #000;
		font-size: 28px;
		font-weight: bold;
		line-height: 105%;
		padding: 20px 60px;
		text-align: center;
	}
	.pos{
		color: #0248BB;
		font-size: 11px;
		text-transform: uppercase;
		font-weight: bold;
	}
	.bio_close:hover{
		text-decoration: underline;
	}
	.bio_close{
		color: #0248BB;
		font-size: 13px;
		text-transform: uppercase;
		font-weight: bold;
		padding: 0px 10px 0px 0px;
		text-align: right;
		margin-top: -20px;
		cursor: pointer;
	}
	.peoples{
		padding-top: 60px;
		display: flex;
		justify-content: space-around;
	    flex-wrap: wrap;

	}
	.profile{
		color: #141414;
		border-bottom: 1px solid #141414;
		margin: 0px 90px;
		font-weight: bold;
		font-size: 12px;
		padding:15px 0px 5px 0px;
		text-transform:uppercase;
		cursor: pointer;
	}
	.bc{
		margin-top:100px ;
		margin-bottom:40px ;
		font-weight: bold;
		font-size: 18px;
		text-transform: uppercase;

		/* primary GREEN */

		color: #279F00;
	}
	.comm_header{
		font-size: 24px;
		font-weight: bold;
		color: #141414;

	}
	.description{
		width: 75%;
		text-align: justify;
	}
	.crh{
		font-size: 16px;
		line-height: 145%;
		letter-spacing: 0.01em;
		color: #141414;
		font-weight: bold;
		padding-top:5px ;
		padding-bottom:10px ;
	}
	.com_left{
		display: inline-block;
		width: 25%;
		padding: 20px;
	}
	.com_right{
		display: inline-block;
		width: 70%;
	}
	.tt:nth-child(2), .tt:nth-child(3){
		display: none;
	}
	.comm{
		border-top: 1px solid #959595;
		padding: 20px 0px 30px 0px;
	}

	.bio{
		text-align: justify;
		display: none;
		position: fixed;
		background-color: #fff;
		top: 50px;
		left: 20%;
		border: 1px solid #ababab;
		z-index: 999;
		padding: 50px 30px;
		width: 60%;
		border-radius: 5px;
		box-shadow: 0px 0px 10px #0000003b;
		white-space:pre-line;



	}
	.m_bio{display: none!important;}
	}

	@media(max-width: 900px){
			.tt:nth-child(2), .tt:nth-child(3){
		display: none;
	}
			.center{
		padding: 0px 20px;
		}

		.bc{
		font-weight: bold;
font-size: 10px;
padding-top: 20px;
text-transform: uppercase;

/* primary GREEN */

color: #279F00;
		}

		.comm{
		margin-bottom:20px;
		border-top:1px solid #aaa;
		}
		.comm_header{
		font-style: normal;
font-weight: bold;
font-size: 26px;
padding: 10px 0px;

/* black */

color: #141414;
		}

		.bread{display: none}
		.header{
			font-size: 38px;
			color: #141414;
			font-weight:700;
		}
		#header {
		margin-bottom: 0px !important;
		}
		.tabs{
			color: #141414;
			padding-top: 50px;
		}
		.top{
			background-color: #F8F8F8;
			width: 100%;
			padding:30px 10px 0px 10px;
		}
		.tab_item{

			font-weight: 800;
			padding-bottom: 5px;
			margin: 8px;
			margin-right:50px;

		}
		.ta{
			border-bottom: 2px solid #141414;
		}
	 .tab_item{
			display: inline-block;
		}
		#page {
			display: table !important;
		}
		.peoples{
			margin-top: 40px;
			width: 100%;
		}
		.people{
			width: 100%;
			display: block;
			padding: 20px 10px;
		}
		.photo{
			float: left;
			width: 50px;
			height: 50px;
			background-size: cover;
			border-radius: 50px;
			background-position: center;
			margin-right: 10px;
		}
		.name{
			font-family: Montserrat;
			font-style: normal;
			font-weight: bold;
			font-size: 16px;
			color: #141414;
			margin-top: 10px;
		}
		.pos{
			font-size: 9px;
			line-height: 125%;
			font-style: normal;
			font-weight: bold;
			letter-spacing: 0.08em;
			text-transform: uppercase;
			color: #0248BB;
		}
		.profile{
			display: none;
		}
		.bio{
			display: none;
		}
		.m_bio{
			margin: 20px 0px;
			box-shadow: 0px 0px 20px #777;
			border-radius: 10px;
			width: 90%;
		text-align: center;
		display: none;

		}
		.m_name{
		font-weight: bold;
		font-size: 26px;
		line-height: 100%;
		padding: 20px 50px;
		text-align: center;
		color: #000000;

		}
		.m_pos{
		font-weight: bold;
		font-size: 10px;
		line-height: 125%;
		text-align: center;
		letter-spacing: 0.04em;
		text-transform: uppercase;
		color: #0248BB;
		}
		.m_desc{
		font-size: 14px;
line-height: 145%;
/* or 20px */
		padding: 10px 10px 30px 10px;
text-align: center;

/* grey text */

color: #828282
		}

		.m_photo{
			height:300px ;
			background-size: cover;
			background-position: center;
			background-repeat:no-repeat ;
				border-radius: 10px 10px 0px 0px;

		}
	}



</style>
<div style="width: 100%; color:#828282!important;">
	<div class="top">
		<div class="bread">
			<div class="bread_item">OctoLNG »</div>
			<div class="bread_item">Who we are »</div>
			<div class="bread_item" style="color: #000">Management </div>
		</div>
		<div class="header">Team & Governance</div>
		<div class="tabs">
			<div class="tab_item ta">Board of Directors</div>
			<div class="tab_item">Executive Management</div>
			<div class="tab_item">Corporate Governance</div>
		</div>

	</div>
	<div class="center">


		<div class="tt page1">
		<div class="description">
			<?=$mc[0]->content?>
		</div>




			<div class="peoples">

				<?foreach ($users1 as $user1 ){?>
					<div class="people">
						<div class="photo" style="background-image: url('<?=base_url()?>photo/<?=$user1->photo?>')">

						</div>
						<div class="name"><?=$user1->name?></div>
						<div class="pos"><?=$user1->pos?></div>
						<div class="profile">Profile</div>
						<div class="bio">
							<div class="bio_close">Close</div>
							<div class="photo" style="margin-bottom:10px;background-image: url('<?=base_url()?>photo/<?=$user1->photo?>')">

							</div>

							<?=$user1->description?>

						</div>
						
						<div class="m_bio">
							<div class="m_photo"  style=" background-image: url('<?=base_url()?>photo/<?=$user1->photo?>')"></div>
							<div class="m_name"><?=$user1->name?></div>
							<div class="m_pos"><?=$user1->pos?></div>
							<div class="m_desc"><?=$user1->description?></div>
						</div>
					</div>
				<?}?>


			</div>



		<div class="bc">
			Board Committees
		</div>


			<?foreach ($comm as $com){?>
		<div class="comm">
			<div class="comm_header">Committee: <?=$com->name?></div>
			<div class="comm_desc">
				<div class="com_left"></div>
				<div class="com_right">

					<div class="crh">Description:</div>
					<div class="comm_content"><?=$com->description?></div>



				</div>
			</div>
			<div class="read_more"></div>
		</div>
			<?}?>


		</div>




		<div class="tt page2">


			<div class="description">
				<?=$mc[1]->content?>
			</div>


			<div class="peoples">

				<?foreach ($users2 as $user2 ){?>
					<div class="people">
						<div class="photo" style="background-image: url('<?=base_url()?>photo/<?=$user2->photo?>')">

						</div>
						<div class="name"><?=$user2->name?></div>
						<div class="pos"><?=$user2->pos?></div>
						<div class="profile">Profile</div>
						<div class="bio">
							<div class="bio_close">Close</div>

							<div class="photo" style="margin-bottom:10px; background-image: url('<?=base_url()?>photo/<?=$user2->photo?>')">

							</div>
							<?=$user2->description?>
						</div>
						<div class="m_bio">
							<div class="m_photo"  style="background-image: url('<?=base_url()?>photo/<?=$user2->photo?>')"></div>
							<div class="m_name"><?=$user2->name?></div>
							<div class="m_pos"><?=$user2->pos?></div>
							<div class="m_desc"><?=$user2->description?></div>
						</div>
					</div>
				<?}?>


			</div>



		</div>
		<div class="tt page3">
			<div class="description">
				<?=$mc[2]->content?>
			</div>


			<div class="bc">
				corporate governance framework
			</div>

			<div class="main_files">
				<?foreach ($files as $file){
					if($file->file_group != 0){continue;}
					?>
				<div class="files">
					<div class="pdf <?=($file->url=='' or $file->url==' ')?' op05':'';?>"></div>
					<a target="_blank" href="<?=$file->url?>" class="file_name"><?=$file->name?></a>
				</div>
				<?}?>
			</div>
			<?foreach ($file_groups as $fg){?>
				<div class="files" >
					<div class="pdf" style="background: none"></div>
					<div class="file_name" style="border: none"><?=$fg->name?></div>
				</div>

			<div class="main_files">
				<?foreach ($files as $file){
					if($file->file_group != $fg->id){continue;}
					?>
					<div class="files">
						<div class="pdf" style="background: none"></div>

						<div class="pdf <?=($file->url=='' or $file->url==' ')?' op05':'';?>"></div>
						<a  target="_blank" href="<?=$file->url?>" class="file_name"><?=$file->name?></a>
					</div>
				<?}?>
			</div>
			<?}?>

		</div>









</div></div>


</div>
<script>
	$(function () {

		$('.profile').on('click',function () {
			$('.bio').hide()
			$(this).next('.bio').fadeIn(400)
		})

		$('.bio_close').on('click',function () {
			$(this).parent('.bio').fadeOut(400)
		})

			$('.tab_item').on('click',function () {
				$('.tab_item').removeClass('ta');
				$(this).addClass('ta');
				$('.tt').hide();
				$('.page'+($(this).index()+1)).show();
			})

	$('.people').on('click',function(){
		$(this).find('.m_bio').slideToggle(400);
	});


	})
</script>
