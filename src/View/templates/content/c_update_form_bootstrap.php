<?php use Framework\Services\Helpers\LinkManager; ?>

<h2>Update</h2>
<div class="mb-2">
    <form action="<?= LinkManager::link('/update_action') ?>" method="post">
        <div class="mb-3">
            <label class="form-label" for="id">id</label>
            <input class="form-control" type="text" name="id" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="item">item</label>
            <input class="form-control" type="text" name="item" value="update item" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">description</label>
            <input class="form-control" type="text" name="description" value="update description" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">price</label>
            <input class="form-control" type="text" name="price" value="<?= rand(1, 1000); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">image</label>
            <input class="form-control" type="text" name="image" value="update.jpeg" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>

<div class="mb-2">
    <a class="btn btn-outline-primary" href='<?= LinkManager::returnReferenceLink() ?>'>Back</a>
</div>