<header class="site-header">
	<div class="site-header-topbar mobile">
		<div class="container">
			<div class="row align-items-end no-gutters">
				<div class="col-auto">
					<div class="text-color">
						<div class="txt">
							{$lang['home']['changedisplay']}
						</div>
						<ul class="item-list">
							<li class="active">
								<a href="javascript:void(0)" class="theme theme-style-1" title="default theme">C</a>
							</li>
							<li>
								<a href="javascript:void(0)" class="theme theme-style-2" title="black and white theme">C</a>
							</li>
							<li>
								<a href="javascript:void(0)" class="theme theme-style-3" title="black and yellow theme">C</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-auto">
					<div class="text-size">
						<div class="txt">
							{$lang['home']['fontsize']}
						</div>
						<ul class="item-list">
							<li class="active">
								<a href="javascript:void(0)" class="size size-small typo-s" title="size small">{$settingWeb['font'][$langon]}</a>
							</li>
							<li>
								<a href="javascript:void(0)" class="size size-medium typo-md" title="size medium">{$settingWeb['font'][$langon]}</a>
							</li>
							<li>
								<a href="javascript:void(0)" class="size size-large typo-lg" title="size large">{$settingWeb['font'][$langon]}</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div class="text-language" style="float: right;">
						<ul class="item-list">
							<li class="{if $langon eq 'en'}active{/if}">
								<a href="{$ul}/lang/en" class="link lg" title="English language">
									<div class="icon">
										<img src="{$template}/assets/img/icon/gb.svg" alt="Flag of the United Kingdom">
									</div>
								</a>
							</li>
							<li class="{if $langon eq 'th'}active{/if}">
								<a href="{$ul}/lang/th" class="link lg" title="Thai language">
									<div class="icon">
										<img src="{$template}/assets/img/icon/th.svg" alt="Flag of the Thailand">
									</div>
								</a>
							</li>
							<li class="{if $langon eq 'cn'}active{/if}">
								<a href="{$ul}/lang/cn" class="link lg" title="Chinese language">
									<div class="icon">
										<img src="{$template}/assets/img/icon/cn.svg" alt="Flag of China">
									</div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row align-items-center no-gutters">
			<div class="col-auto">
				<div class="brand">
					<a href="{$ul}/home" class="link" title="Gem and Jewelry Institute of Thailand">
						<img src="{$template}/assets/img/static/git-logo.png" alt="Gem and Jewelry Institute of Thailand Logo">
					</a>
				</div>
			</div>
			<div class="col">
				<div class="site-header-topbar">
					<div class="row justify-content-md-end align-items-end no-gutters">
						<div class="col-auto">
							<div class="text-color">
								<div class="txt">
									{$lang['home']['changedisplay']}
								</div>
								<ul class="item-list">
									<li class="active">
										<a href="javascript:void(0)" class="theme theme-style-1" title="default theme">C</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="theme theme-style-2" title="black and white theme">C</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="theme theme-style-3" title="black and yellow theme">C</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-auto">
							<div class="text-size">
								<div class="txt">
									{$lang['home']['fontsize']}
								</div>
								<ul class="item-list">
									<li class="active">
										<a href="javascript:void(0)" class="size size-small typo-s" title="size small">{$settingWeb['font'][$langon]}</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="size size-medium typo-md" title="size medium">{$settingWeb['font'][$langon]}</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="size size-large typo-lg" title="size large">{$settingWeb['font'][$langon]}</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-auto">
							<div class="text-language">
								<ul class="item-list">
									<li class="{if $langon eq 'en'}active{/if}">
										<a href="{$ul}/lang/en" class="link lg" title="English language">
											<div class="icon">
												<img src="{$template}/assets/img/icon/gb.svg" alt="Flag of the United Kingdom">
											</div>
										</a>
									</li>
									<li class="{if $langon eq 'th'}active{/if}">
										<a href="{$ul}/lang/th" class="link lg" title="Thai language">
											<div class="icon">
												<img src="{$template}/assets/img/icon/th.svg" alt="Flag of the Thailand">
											</div>
										</a>
									</li>
									<li class="{if $langon eq 'cn'}active{/if}">
										<a href="{$ul}/lang/cn" class="link lg" title="Chinese language">
											<div class="icon">
												<img src="{$template}/assets/img/icon/cn.svg" alt="Flag of China">
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-auto">
							<div class="search">
								<a href="javascript:void(0)" class="search-toggle" title="search">
									<span class="feather icon-search"></span>
								</a>
								<form class="form">
									<div class="input-group">
										<div class="form-outline">
											<input type="search" id="keywords" class="form-control" placeholder="{$lang['system']['search']}..." />
											<label class="visuallyhidden" for="keywords">{$lang['system']['search']}</label>
										</div>
										<button type="button" class="btn btn-search">
											<span class="feather icon-search"></span>
										</button>
										<button type="button" class="btn close">
											<span class="feather icon-x"></span>
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="site-header-main">
					<div class="row no-gutters justify-content-end align-items-center">
						<div class="col-auto">
							<div class="main-menu-list">
								<ul class="nav-list level-I">
									<li class="active">
										<a href="{$ul}/home" class="link" title="{$lang['menu']['home']}">
											{$lang['menu']['home']}
										</a>
									</li>
										{$counter = 1}
										{$counterArr = count($arrMenu)}
									{foreach $arrMenu as $keyarrMenu => $valuearrMenu}
										{if count($valuearrMenu['subgroup']) > 0}
											<li class="{if $counter eq 1}dropright{/if} {if $counter eq $counterArr}dropleft{/if}">
												<a href="javascript:void(0)" class="link link-submenu" data-link="{$keyarrMenu}-menu" title="เกี่ยวกับเรา" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													{$valuearrMenu['group']['subject']}
												</a>
											</li>
										{else}
											<li>
												<a href="{$ul}/{$valuearrMenu['group']['page']}" class="link" title="{$valuearrMenu['group']['subject']}">
													{$valuearrMenu['group']['subject']}
												</a>
											</li>
										{/if}
										{$counter = $counter+1}
									{/foreach}
									{* <li>
										<a href="javascript:void(0)" class="link link-submenu" data-link="service-menu" title="งานบริการ">
											งานบริการ
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link link-submenu" title="งานฝึกอบรม">
											งานฝึกอบรม
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link link-submenu" title="งานบริการข้อมูล">
											งานบริการข้อมูล
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link link-submenu" title="งานวิจัย">
											งานวิจัย
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link link-submenu" title="บริการออนไลน์">
											บริการออนไลน์
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" class="link link-submenu" title="สมาชิกสัมพันธ์">
											สมาชิกสัมพันธ์
										</a>
									</li>
									<li class="dropleft">
										<a href="javascript:void(0)" class="link link-submenu" title="ติดต่อเรา" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											ติดต่อเรา
										</a>
									</li> *}
								</ul>
							</div>
						</div>
						
						<div class="col-auto">
							<div class="menu">
								<a href="javascript:void(0)" class="menu-toggle" title="menu">
									<!-- <span class="feather icon-menu"></span> -->
									<div>
										<span class="bar"></span>
										<span class="bar"></span>
										<span class="bar"></span>
										<span class="bar"></span>
									</div>
								</a>
							</div>

						</div>
					</div>
					<!-- site-header-main -->
				</div>
			</div>
		</div>

	</div>
</header>

<div class="menu-full">
	<div class="main-menu">
		<ul class="nav-list level-I">
			<li>
				<a href="{$ul}/home" class="link active" title="{$lang['menu']['home']}">
					{$lang['menu']['home']}
				</a>
			</li>
			{foreach $arrMenu as $keyarrMenu => $valuearrMenu}
					<li class="{$keyarrMenu}-menu dropright">
							<a href="javascript:void(0)" class="link submenu" title="{$valuearrMenu['group']['subject']}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								{$valuearrMenu['group']['subject']}
							</a>
							{if count($valuearrMenu['subgroup']) > 0}
								<ul class="dropdown-menu level-II">
									<li class="active mb-3 d-sm-none d-block">
										<a href="javascript:void(0)" class="link text-light typo-lg fw-medium" title="{$valuearrMenu['group']['subject']}">
											<span class="feather icon-chevron-left"></span>
											{$valuearrMenu['group']['subject']}
										</a>
									</li>
										{foreach $valuearrMenu['subgroup'] as $keySubmenu => $valueSubmenu}
											<li class="dropdown-item">
												<a href="javascript:void(0)" class="link text-light typo-sm" title="{$valueSubmenu['subject']}">{$valueSubmenu['subject']}</a>
											</li>
										{/foreach}
										{* <li class="dropdown-item">
											<a href="javascript:void(0)" class="link text-light typo-sm" title="ทิศทางองค์กร">นโยบายและแผนxxx</a>
											<ul class="item-list bullet">
												<li>
													<a href="https://www.youtube.com/watch?v=IFlB_3KRayk" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
												</li>
												<li>
													<a href="javascript:void(0)" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
												</li>
												<li>
													<a href="javascript:void(0)" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
												</li>
											</ul>
										</li> *}
								</ul>
							{else}
								xxxxx	
							{/if}
					</li>
			{/foreach}
			{* <li class="about-menu dropright">
				<a href="javascript:void(0)" class="link submenu" title="เกี่ยวกับเรา" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					เกี่ยวกับเรา
				</a>
				<ul class="dropdown-menu level-II">
					<li class="active mb-3 d-sm-none d-block">
						<a href="javascript:void(0)" class="link text-light typo-lg fw-medium" title="เกี่ยวกับเรา">
							<span class="feather icon-chevron-left"></span>
							เกี่ยวกับเรา
						</a>
					</li>

						<li class="dropdown-item">
							<a href="javascript:void(0)" class="link text-light typo-sm" title="ทิศทางองค์กร">ทิศทางองค์กร</a>
						</li>
						<li class="dropdown-item">
							<a href="javascript:void(0)" class="link text-light typo-sm" title="ทิศทางองค์กร">นโยบายและแผน</a>
							<ul class="item-list bullet">
								<li>
									<a href="https://www.youtube.com/watch?v=IFlB_3KRayk" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
								</li>
								<li>
									<a href="javascript:void(0)" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
								</li>
								<li>
									<a href="javascript:void(0)" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
								</li>
							</ul>
						</li>
				</ul>
			</li>
			<li class="service-menu dropright">
				<a href="javascript:void(0)" class="link submenu" title="งานบริการ" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					งานบริการ
				</a>
				<ul class="dropdown-menu level-II">
					<li class="active mb-3 d-sm-none d-block">
						<a href="javascript:void(0)" class="link text-light typo-lg fw-medium" title="งานบริการ">
							<span class="feather icon-chevron-left"></span>
							งานบริการ
						</a>
					</li>


						<li class="dropdown-item active">
							<a href="javascript:void(0)" class="link text-light typo-sm" title="ทิศทางองค์กร">งานบริการ</a>
						</li>
						<li class="dropdown-item">
							<a href="javascript:void(0)" class="link text-light typo-sm" title="ทิศทางองค์กร">นโยบายและแผน</a>
							<ul class="item-list bullet">
								<li>
									<a href="javascript:void(0)" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
								</li>
								<li>
									<a href="javascript:void(0)" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
								</li>
								<li>
									<a href="javascript:void(0)" class="link text-light typo-s" title="รายงานประจำปี">รายงานประจำปี</a>
								</li>
							</ul>
						</li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)" class="link" title="งานฝึกอบรม">
					งานฝึกอบรม
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="link" title="งานบริการข้อมูล">
					งานบริการข้อมูล
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="link" title="งานวิจัย">
					งานวิจัย
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="link" title="บริการออนไลน์">
					บริการออนไลน์
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="link" title="สมาชิกสัมพันธ์">
					สมาชิกสัมพันธ์
				</a>
			</li>
			<li>
				<a href="javascript:void(0)" class="link" title="ติดต่อเรา">
					ติดต่อเรา
				</a>
			</li> *}
		</ul>
	</div>
</div>