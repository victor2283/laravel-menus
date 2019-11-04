<style>
    .{{$mostrar}}{
            max-width: 600px;
            max-height: 600px;
            //-webkit-background-size: cover;
            -moz-background-size: cover;
            //-o-background-size: cover;
            background-repeat: no-repeat;
            background-size: contain;
            background-color: #66999;
            //background-attachment: scroll;
            background-position: center center;
            z-index: auto;
            width: 400px;
            height: 400px;
            }
            @media only screen and (max-width: 767px) {
                    .{{$mostrar}}{
                            background-image: url("");
                    }
            #{{$caja}}{background-size:contain;}              
        }
    </style>