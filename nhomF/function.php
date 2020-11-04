<?php 
// Get All eroors
function get_eroors($errors)
{
    if (count($errors) > 0) {
        echo '<br><div class="alert alert-danger alert-dismissible fade show ml-3 mr-3 " role="alert">';
        foreach ($errors as $error) {
            echo "<div>- $error</div>";
        }
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
}

// Get All success
function get_success($success)
{
    if (count($success) > 0) {
        echo '<br><div class="alert alert-success alert-dismissible fade show ml-3 mr-3 " role="alert">';
        foreach ($success as $succes) {
            echo "<div>- $succes</div>";
        }
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
}