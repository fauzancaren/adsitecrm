<style>
    .fab {
        background-color: transparent;
        height: 50px;
        width: 50px;
        border-radius: 32px;
        transition: height 300ms;
        transition-timing-function: ease;
        position: fixed;
        right: 30px;
        bottom: 30px;
        /* tinggi tombol */
        text-align: center;
        overflow: hidden;
        z-index: 10;
    }

    .fab:hover {
        height: 150px;
        /* tinggi icon muncul */
    }

    .fab:hover .mainop {
        transform: rotate(180deg);
    }

    .mainop {
        margin: auto;
        width: 50px;
        height: 50px;
        position: absolute;
        bottom: 0;
        right: 0;
        transition: transform 300ms;
        background-color: #5d77c5;
        border-radius: 100px;
        z-index: 6;
    }



    .mainop i {
        margin-top: 10px;
        font-size: 32px;
        color: #fff;
    }

    .minifab {
        position: relative;
        width: 48px;
        height: 48px;
        border-radius: 24px;
        z-index: 5;
        background-color: blue;
        transition: box-shadow 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }



    .op {
        background-color: #5d77c5;
    }
</style>

<div class="mainopShadow d-lg-block d-none"></div>
<div class="fab d-lg-block d-none">
    <div class="mainop button_float d-flex justify-content-center align-items-center">
        <div id="addIcon" class="material-icons" style="font-size: 30px; color:#fff;">+</div>
    </div>

    <div id="sheets" type="button" class="minifab op btn btn-primary p-3" data-toggle="modal" data-target="#add_leads">
        <i class="fa fa-id-card  " aria-hidden="true" style="color:#fff;"></i>
    </div>
    <div id=" sheets" class="minifab op btn btn-primary p-3 " type="button" data-toggle="modal" data-target="#add_user">
        <i class="fa fa-user-plus" aria-hidden="true" style="color:#fff; "></i>
    </div>
</div>