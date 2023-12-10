<?php require_once "session.php"  ?>
<?php require_once "./includes/header.php"  ?>
<?php require_once "../models/connect.php"  ?>
<?php $selectCate = selectCategories()  ?>
<?php $selectEdit = selectEdit($_GET['id']);  ?>


<?php if (!empty($_SESSION['errors'])) : ?>
    <ul>
        <?php foreach ($_SESSION['errors'] as $value) : ?>
            <li class="text-error font-bold"><?= $value; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<form class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12" action="../controllers/update.php" method="post" enctype="multipart/form-data">
    <div class="relative py-3 sm:w-96 mx-auto text-center">
        <span class="text-2xl font-light ">Edit</span>
        <div class="mt-4 bg-white shadow-md rounded-lg text-left">
            <div class="h-2 bg-purple-400 rounded-t-md"></div>
            <div class="px-8 py-6 ">

                <input type="text" placeholder="id" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md hidden" name="id" value="<?= $selectEdit['id'] ?>">

                <select class="select select-bordered w-full max-w-xs mb-2" name="category_id">
                    <option disabled selected><?= $selectEdit['name'] ?></option>
                    <?php foreach ($selectCate as $key => $value) :  ?>
                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <label class="block font-semibold"> name </label>
                <input type="text" placeholder="name" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md" name="name" value="<?= $selectEdit['name'] ?>">

                <label class="block font-semibold"> brand </label>
                <input type="text" placeholder="brand" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md" name="brand" value="<?= $selectEdit['brand'] ?>">

                <label class="block font-semibold"> img </label>
                <input type="file" class="file-input file-input-bordered w-full max-w-xs mt-2 mb-2" name="img" />

                <input type="text" class="file-input file-input-bordered w-full max-w-xs mt-2 mb-2 hidden" name="imgNew" value="<?= $selectEdit['img'] ?>" />

                <div class="avatar">
                    <div class="w-24 rounded">
                        <img src="<?= "data:image/jpeg;base64," . $selectEdit['img'] ?>" />
                    </div>
                </div>

                <label class="block font-semibold"> describe </label>
                <input type="text" placeholder="describe" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md" name="describe" value="<?= $selectEdit['describe'] ?>">

                <div class="flex justify-between items-baseline">
                    <button type="submit" class="mt-4 bg-purple-500 text-white py-2 px-6 rounded-md hover:bg-purple-600 ">Edit</button>
                </div>
            </div>

        </div>
    </div>
</form>




<?php require_once "./includes/footer.php"  ?>