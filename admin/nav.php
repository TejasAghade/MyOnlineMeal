<div class="top-navbar">
    <nav class="navbar  navbar-expand-lg">

        <div>
            <button type="button" id="sidebar-collapse" class="d-xl-block d-lg-block d-md-none d-none">
                <span class="material-icons">menu</span>
            </button>
        </div>

        <div class="admin-title-logout flex-admin-header">

            <a class="navbar-brand " href="#"><span class="navbar-brand-title">Dashboard</span></a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">more_vert</span>
            </button>

            

            <a class="admin-name" type="button" class="" data-toggle="modal" data-target="#exampleModal">
                <span><?php  echo $_SESSION['admin_name'];  ?></span>
                <img class="logout-ico" src="../images/logout.png" alt="...">
            </a>


        </div>

    </nav>

</div>


<div class="modal fade logout-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" >

            <div class="modal-body" style="width:100%;display: flex; justify-content: center;">
                <a href="logout.php"  class="btn btn-danger btn-sm  pe-5 ps-5">LogOut</a>

            </div>

        </div>
    </div>
</div>