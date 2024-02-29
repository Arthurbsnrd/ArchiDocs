<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ArchiDocs</title>
    <link rel="stylesheet" href="../../styles/base.css">
    <link rel="stylesheet" href="../../styles/dashboard.css">
    <script src="../../js/navbar.js" defer></script>
    <link rel="shortcut icon" href="../../assets/ArchiDocs-Logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3181ebab68.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Icon Bootstrap -->
</head>


<body>
    <?php include '../../includes/navbar.php'; ?>
    
    <div class="contenue">
        <div class="dashboard">
            <!-- Section: Statistics with subtitles -->
            <section class="chart">
               <div class="row" style="display: flex">
                   <div class="col-xl-6 col-md-12 mb-4">
                       <div class="card">
                       <div class="card-body">
                           <div class="d-flex justify-content-between p-md-1">
                           <div class="d-flex flex-row">
                               <div class="align-self-center">
                               <i class="fas fa-user text-success fa-3x me-4"></i>
                               </div>
                               <div>
                               <h4>Nombre de clients</h4>
                               <p class="mb-0"></p>
                               </div>
                           </div>
                           <div class="align-self-center">
                               <?php
                               echo "<h2 class='h1 mb-0'> 78 </h2>";
                               ?>
                           </div>
                           </div>
                       </div>
                       </div>
                   </div>
                   <div class="col-xl-6 col-md-12 mb-4">
                       <div class="card">
                       <div class="card-body">
                           <div class="d-flex justify-content-between p-md-1">
                           <div class="d-flex flex-row">
                               <div class="align-self-center">
                               <i class="fas fa-chart-pie text-warning fa-3x me-4"></i>
                               </div>
                               <div>
                               <h4>Total de fichier</h4>
                               <p class="mb-0"></p>
                               </div>
                           </div>
                           <div class="align-self-center">
                               <h2 class="h1 mb-0"><?php echo "150"; ?></h2>
                           </div>
                           </div>
                       </div>
                       </div>
                   </div> 
                   <div class="col-xl-12 col-md-12 mb-4">
                       <div class="card">
                       <div class="card-body">
                           <div class="d-flex justify-content-between p-md-1">
                           <div class="d-flex flex-row">
                               <div class="align-self-center">
                               <i class="fas fa-chart-pie text-warning fa-3x me-4"></i>
                               </div>
                               <div>
                               <h4>Nombre de fichier du jour</h4>
                               <p class="mb-0"></p>
                               </div>
                           </div>
                           <div class="align-self-center">
                               <h2 class="h1 mb-0"><?php echo "17"; ?></h2>
                           </div>
                           </div>
                       </div>
                       </div>
                   </div> 
               </div>
            </section>
            <!-- Section: Main chart -->

            <!-- Repartition des fichier par client -->
            <canvas id="chart-pie"></canvas>
            <script>
                const dataPie = {
                    type: "pie",
                    data: {
                        labels: ["Monday", "Tuesday", "Wednesday", "Thursday"],
                        datasets: [{
                        data: [1234, 2234, 3234, 4234],
                        backgroundColor: ["rgba(117,169,255,0.6)", "rgba(148,223,215,0.6)",
                            "rgba(208,129,222,0.6)", "rgba(247,127,167,0.6)"
                        ],
                        }, ],
                    },
                    };

                    new mdb.Chart(document.getElementById("chart-pie"), dataPie);
            </script>

        </div>
    </div>
</body>

</html>