<?php
session_start();
if (!isset($_SESSION['user_info'])){
    header("location:login.php");
}

?>
<?php
include "includes/header-content.php";
include "includes/sidebar-content.php";
?>
    <!--/ HEADER Content  -->

    <!-- CONTENT -->
    <section id="content">
        <div class="page dashboard-page">
            <!-- bradcome -->
            <div class="b-b mb-20">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h1 class="h3 m-0">Dashboard</h1>
                        <small class="text-muted">Welcome to Portal application</small>
                    </div>
                </div>
            </div>


        </div>
    </section>
</div>
<?php
    include "includes/footer.php";
?>