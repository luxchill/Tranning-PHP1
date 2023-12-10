<?php require_once "./includes/header.php"  ?>
<?php require_once "../models/connect.php"  ?>
<?php $result = selectAll();  ?>


<div class="flex justify-between">
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <a href="index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                Table
            </li>

        </ul>
    </div>

    <div class="text-sm breadcrumbs flex">
        <ul>
            <a href="create.php">
                <li>
                    <span class="inline-flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Add Car
                    </span>
                </li>
            </a>
        </ul>
    </div>
</div>

<div class="overflow-x-auto">
    <table class="table">
        <thead>
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>Id</th>
                <th>name</th>
                <th>brand</th>
                <th>img</th>
                <th>describe </th>
                <th>category_name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key => $value) :  ?>
                <?php
                // echo "<pre>";
                // print_r($value);
                // echo "</pre>";
                ?>
                <tr>
                    <th>
                        <label>
                            <input type="checkbox" class="checkbox" />
                        </label>
                    </th>
                    <td>
                        <?= $value['id'] ?>
                    </td>
                    <td>
                        <?= $value['name_car'] ?>
                    </td>
                    <td>
                        <?= $value['brand'] ?>
                    </td>
                    <th>
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                                <img src="<?= "data:image/jpeg;base64," . $value['img'] ?>" alt="Avatar Tailwind CSS Component" />
                            </div>
                        </div>
                    </th>
                    <th>
                        <?= $value['describe'] ?>
                    </th>
                    <th>
                        <?= $value['name'] ?>
                    </th>
                    <th>
                        <a href="update.php?id=<?= $value['id'] ?>" class="btn btn-success">Edit</a>
                        <a href="../controllers/delete.php?id=<?= $value['id'] ?>" class="btn btn-error" onclick="return confirm('Ban co muon xoa id: <?= $value['id'] ?>')">Delete</a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once "./includes/footer.php"  ?>