 <div class="flex-container-side">
     <div class="flex-item-left"></div>
     <div class="flex-item-center">
         <amp-img src="{{ $site_settings['logo_url'] }}" height="36px" width="100px" alt="Logo">
         </amp-img>
     </div>
     <div class="flex-item-right">
         @if ($site_settings['payment'] == '1' || $site_settings['togel_prediction'] == '1')
             <button class="side" on="tap:sidebar1">
                 <span class="material-symbols-rounded" style="font-size:28px; color:#FAF0D7">menu</span>
             </button>
             <amp-sidebar class="side-bar" id="sidebar1" layout="nodisplay" side="right">
                 <amp-list layout="fixed-height" height="915" src="/jenisAll.json" binding="no" items="."
                     single-item>
                     <template type="amp-mustache">
                         <amp-nested-menu layout="fill">
                             <ul>
                                 <li>
                                     <div class="menu-side"><a class="menu-side" href="/">Home</a></div>
                                 </li>
                                 @if ($site_settings['payment'] == '1')
                                     <li>
                                         <div class="menu-side">
                                             <a class="menu-side" href="{{ route('payment') }}">Bukti Bayar</a>
                                         </div>
                                     </li>
                                 @endif
                                 @if ($site_settings['togel_prediction'] == '1')
                                     <li>
                                         <div class="menu-side" amp-nested-submenu-open>Prediksi Togel</div>
                                         <div amp-nested-submenu>
                                             <ul>
                                                 <li>
                                                     <div class="menu-side back" amp-nested-submenu-close>
                                                         &larr; Kembali
                                                     </div>
                                                 </li>
                                                 <li>
                                                     <div class="menu-side-type">
                                                         <a class="menu-side-type"
                                                             href="{{ route('prediksi') }}">Prediksi Pools</a>
                                                     </div>
                                                 </li>
                                                 @{{ #items }}
                                                 <li>
                                                     <div class="menu-side-type">
                                                         <a class="menu-side-type"
                                                             href="{{ route('prediksiPasaran') }}/@{{ nama_togel }}">Prediksi
                                                             @{{ nama_togel }}</a>
                                                     </div>
                                                 </li>
                                                 @{{ /items }}
                                             </ul>
                                         </div>
                                     </li>
                                 @endif
                             </ul>
                         </amp-nested-menu>
                     </template>
                 </amp-list>
             </amp-sidebar>
         @endif
     </div>
 </div>
