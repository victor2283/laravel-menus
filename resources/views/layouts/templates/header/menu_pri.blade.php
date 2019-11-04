    @if(!isset($clase_menu))
       @php $clase_menu =  'menu-desktop' @endphp
    @endif

    @if($clase_menu=='menu-desktop')
          @php $mainmenu = 'main-menu';  @endphp
          @php $sub = 'sub-menu';  @endphp     
<div class="{{$clase_menu}}"> 
    @else
            @php $mainmenu = 'main-menu-m';  @endphp 
            @php $sub = 'sub-menu-m';  @endphp
    @endif
    <ul class="{{$mainmenu}}">
  
    @foreach ($items_menu as $item)
        @if(isset($item['depende']) && is_array($item['depende']))
        
        
        <li @if (Request::url() == route($item['route'][0], $item['route'][1])) class="active-menu" @endif >
              
            <a href="{{route($item['route'][0], $item['route'][1])}}">{{$item['titulo']}} 
                    
                @if($sub !== 'sub-menu-m')
                        <i class="fa fa-angle-down" aria-hidden="true"> </i>
                    @endif
               </a>
               
                <ul class="{{$sub}}">
                    @foreach ($item['depende'] as $item_)
                        @if(isset($item_['depende']) && is_array($item_['depende']))
                        <li @if (Request::url() == route($item_['route'][0], $item_['route'][1])) class="active-menu" @endif >
                                            <a href="{{route($item_['route'][0], $item_['route'][1])}}">{{$item_['titulo']}} 
                                                @if($sub !== 'sub-menu-m')
                                                    <i class="fa fa-angle-right" aria-hidden="true"> </i>
                                                @endif
                                            </a>
                                            <ul class="{{$sub}}">
                                                @foreach ($item_['depende'] as $item_1)
                                                    <li>
                                                     <a href="{{route($item_1['route'][0], $item_1['route'][1])}}">{{$item_1['titulo']}} </a>         
                                                    </li>
                                                @endforeach
                                            </ul>
                                    </li>        
                        @else
                            <a href="{{route($item_['route'][0], $item_['route'][1])}}">{{$item_['titulo']}} </a>
                        @endif
                    @endforeach
                </ul>
                @if($sub == 'sub-menu-m')
                        <span class="arrow-main-menu-m"> 
                                        <i class="fa fa-angle-right" aria-hidden="true"></i> 
                        </span>
                @endif
           </li>
        @else
            @php  $clase1 = ''; 
            if (Request::url() == route($item['route'][0], $item['route'][1])){
                $clase1 = "active-menu";
            }
            @endphp 
           
                
            @if($item['route'][1]=='product')
                 @if($sub == 'sub-menu-m')
                    
        <li class="label1 rs1 {{$clase1}}" data-label1="hot">
                @else
                    <li class="label1 {{$clase1}}" data-label1="hot">
                            
                @endif
           @else
            <li class ="{{$clase1}}">
           @endif
                <a href="{{route($item['route'][0], $item['route'][1])}}">{{$item['titulo']}} </a>
           </li>
        @endif
    @endforeach
    </ul>
@if($clase_menu=='menu-desktop')
          @php $mainmenu = 'main-menu';  @endphp
          @php $sub = 'sub-menu';  @endphp     
</div>
    @else
            @php $mainmenu = 'main-menu-m';  @endphp 
            @php $sub = 'sub-menu-m';  @endphp
    @endif