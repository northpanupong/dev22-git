<div class="sitemap">
    <div class="container">
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="headingSitemap">
                    <h3 class="mb-0">
                        <button class="btn btn-sm btn-link collapsed" data-toggle="collapse" data-target="#collapseSitemap" aria-expanded="false" aria-controls="collapseSitemap">
                            {$lang['menu']['sitemap']} <span class="feather icon-chevron-up"></span>
                        </button>
                    </h3>
                </div>
                <div id="collapseSitemap" class="collapse" aria-labelledby="headingSitemap" data-parent="#accordion">
                    <div class="card-body">
                        <h4 class="h-title">
                            {$lang['menu']['home']}
                        </h4>
                        <div class="row">
                            {foreach $arrSitemap as $keyarrSitemap => $valuearrSitemap}
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <h4 class="title">
                                        {$valuearrSitemap['group']['subject']}
                                    </h4>
                                    {if count($valuearrSitemap) > 0}
                                        <ul class="list-group">
                                            {foreach $valuearrSitemap['list'] as $keysubgroup => $valuesubgroup}
                                                {if count($valuesubgroup['menu']) > 0}
                                                    <li class="list-group-item">
                                                        <a {if $valuesubgroup['subgroup']['url'] neq "" && $valuesubgroup['subgroup']['url'] neq "#"}href="{$valuesubgroup['subgroup']['url']}" {if $valuesubgroup['subgroup']['target'] eq 2}target="_blank"{/if} {else}href="javascript:void(0);"{/if} class="link" title="{$valuesubgroup['subgroup']['subject']}">{$valuesubgroup['subgroup']['subject']}</a>
                                                        <ul class="sub-list-group item-list">
                                                            {foreach $valuesubgroup['menu'] as $keyMenu => $valueMenu}
                                                                <li>
                                                                    <a {if $valuesubgroup.url neq "" && $valuesubgroup.url neq "#"}href="{$valuesubgroup.url}" {if $valuesubgroup.target eq 2}target="_blank"{/if} {else}href="javascript:void(0);"{/if} class="link" title="{$valueMenu.subject}">{$valueMenu.subject}</a>
                                                                </li>
                                                            {/foreach}
                                                        </ul>
                                                    </li>
                                                {else}
                                                    <li class="list-group-item">
                                                        <a {if $valuesubgroup['subgroup']['url'] neq "" && $valuesubgroup['subgroup']['url'] neq "#"}href="{$valuesubgroup['subgroup']['url']}" {if $valuesubgroup['subgroup']['target'] eq 2}target="_blank"{/if} {else}href="javascript:void(0);"{/if} class="link" title="{$valuesubgroup['subgroup']['subject']}">{$valuesubgroup['subgroup']['subject']}</a>
                                                    </li>
                                                {/if}
                                            {/foreach}
                                        </ul>
                                    {/if}
                                </div>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>