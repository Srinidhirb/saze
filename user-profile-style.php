<?php
header("Content-type: text/css"); // Set the content type as CSS

// PHP code to generate dynamic CSS properties
$color = 'blue';
?>

.top {
            height: 10vh;
        }

        .menu {


            height: 500px;
            padding: 44px 24px 32px 64px;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;
            flex-shrink: 0;

        }

        #hr {
            padding: 0;
            margin: 0%;
            display: block;
        }

        .profile-menu {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 24px;
        }

        .details {
            display: flex;
            flex-direction: row;
        }

        .info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .my-profile {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 54px;
        }

        .my-profile p {
            color: var(--Text-title, #222222);
            font-family: Lato;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
            /* 22.4px */
            letter-spacing: 1px;
        }

        .edit,
        .listing {
            display: flex;

            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .edit p {
            color: var(--Text-title, #222222);
            font-family: Lato;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
            cursor:pointer;
            /* 22.4px */
        }

        .listing p {
            cursor:pointer;
            color: var(--Text-body-1, #222222);
            font-family: Lato;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
            /* 22.4px */
        }

        .log {
            display: flex;
            padding: 80px 50px 80px 80px;
            padding-bottom: 0;
            flex-direction: column;
         
            justify-content:center;
            gap: 10px;
        }

        #toggleMenuBtn{
            display:none;
        }

        .log p {
            color: var(--Text-body-1, #A4A3A3);
            font-family: Lato;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
            /* 22.4px */
        }

        .hr {
            width: 218px;
            height: 0px;
        }

        .hr hr {
            stroke-width: 1px;
            stroke: #EFEFEF;
        }


        .flex {
            padding: 0px 24px 32px 5px;
            display: flex;
            flex-direction: row;
        }

        #editProfileDiv {
            width: 100%;
            padding: 40px;
            
        }

       

        #editProfileDiv p {
            color: var(--Text-title, #989797);
            font-family: Lato;
            
            font-size: 18px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
            padding: 5px;
            /* 33.6px */
        }

        #viewlisting {
            width: 100%;
            padding: 40px;
         
        }

        #listing {
            padding: 40px;
        }

        #viewlisting p {
            color: var(--Text-title, #989797);
            font-family: Lato;
            font-size: 24px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%;
            padding: 23px;
            /* 33.6px */
        }



        form {
            display: flex;
            flex-direction: column;
           
        }

        .name {
            width: 100%;
            display: flex;
            flex-direction: row;

        }
      

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 30vh;
            height: 4vh;
        }

        .first {
            padding-right: 40px;
            padding-bottom: 40px;
        }

        .red {
            color: red;
        }

        .button {
            display: flex;
            width: 171px;
            height: 53px;
            padding: 12px 40px;
            background-color: #031B64;
            justify-content: center;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
            color: #FFF;
            font-family: Lato;
            font-size: 18px;
            font-style: normal;
            font-weight: 400;
            line-height: 22px;
            /* 122.222% */
        }

        @media screen and (max-width: 768px) {
            .menu {
                display: flex;
                /* or display: block; */
                position: absolute;
                top: 125px;
                left: 34px;
                background-color: #fff;
                /* Change background color as needed */
                z-index: 1;
               padding:44px 24px 34px 34px;
                width:62%;
            }
            #toggleMenuBtn{
            display:block;
        }
        #hr {
            padding: 0;
            margin: 0%;
            display: none;
        }
        .features{
            width: 100%;
        }
        #editProfileDiv {
           width: 92%;
    margin: 0 0 0 20px;
    padding: 0px !important;
        }

            
        }

        @media screen and (max-width: 968px) {
            form {
                width: 100%;
            }

            input {
                width: 100%;
            }

            .name {
                flex-direction: column;
            }

            .first,
            .last {
                width: 100%;
                padding-right: 0;
                padding-bottom: 20px;
                /* Adjust spacing between fields if needed */
            }
        }

        .button {
            display: inline-flex;
            align-items: center;
            gap: 20px;

        }

        .button button {

            background-color: #FFF;
            color: black;
        }

        .select {
            background-color: #031B64;
        }

        .options {

              display:flex;
            justify-content: center;
            align-items:center;
           flex-wrap:wrap;
            align-items: center;
            position:relative;
            gap: 20px;
        }

        .width {
            display: flex;
            width: 110px;
            height: 40px;

            justify-content: center;
            align-items: center;
            gap: 8px;
            color: #2A2A2A;
            font-family: Lato;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
        }

        .selected1 {
            color: #EFEFEF;
            background: #031B64;
        }

        #listing {
            display: none;
        }

        .profile-menu .edit.selected p::after,
        .profile-menu .listing.selected p::after {
            content: '';
            display: block;
            width: 100%;
            height: 2px;
            background-color: #031B64;
            /* Change the color as needed */
            margin-top: 5px;
            /* Adjust the spacing as needed */
        }

        .profile-menu .edit p,
        .profile-menu .listing p {
            position: relative;
        }

        @media screen and (max-width: 768px) {
            

            .width {
                width: 100%;
                margin-bottom: 10px;
            }
        }



        #listing:after {
            content: "";
            display: table;
            clear: both;
        }

        .viewlisting {
            width: 100%;

        }
        
.buttons-container {
    position: absolute;
    top: 10px;
    right: 10px;
}

.small-btn {

    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    text-decoration: none;
}

.delete-form {
    display: inline;
    margin: 0;
}





        .width {
            width: 150px;
            /* Adjust the width as needed */
            margin: 0 5px;
            display: inline-block;
            border-radius: 8px;
            border: 1px solid var(--Text-title, #989797);
        }

        .all,
        .expired,
        .active,
        .pending {
            width: 100%;
            padding: 30px 0 0 0;
           
        }
        .image-container {
    position: relative;
}
        .listing-container {
            float: left;
            cursor: pointer;
            background-color: #fff;
            padding: 20px 20px 10px 20px;
          width:cal(100%/4);
          text-align:center;
          
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
            /* Adjust the spacing between containers */
            margin-bottom: 20px;
             position: relative;
    display: inline-block;
        }

        .listing-image {
            max-width: 100%;

            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .info,
        .info1 {
            margin: 0;
            /* Remove default margin for better alignment */
        }