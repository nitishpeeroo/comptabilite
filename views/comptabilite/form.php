   <div class="row">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input id="titre" required type="text" class="form-control" name="name" value="<?= isset($data['name']) ? h($data['name']) : ''; ?>">
                    <?php if (isset($errors['name'])) : ?>
                        <small class="form-text text-muted"><?= $errors['name']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="date">Date</label>
                    <input id="date" required type="date" class="form-control" name="date" value="<?= isset($data['date']) ? h($data['date']) : ''; ?>">
                    <?php if (isset($errors['date'])) : ?>
                        <small class="form-text text-muted"><?= $errors['date']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="start">Démarrage</label>
                    <input id="start" type="time" required placeholder="HH:MM" class="form-control" name="start" value="<?= isset($data['start']) ? h($data['start']) : ''; ?>">
                    <?php if (isset($errors['start'])) : ?>
                        <small class="form-text text-muted"><?= $errors['start']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <label for="end">Fin</label>
                    <input id="end" type="time" required placeholder="HH:MM" class="form-control" name="end" value="<?= isset($data['end']) ? h($data['end']) : ''; ?>">
                    <?php if (isset($errors['end'])) : ?>
                        <small class="form-text text-muted"><?= $errors['end']; ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="description"> <?= isset($data['description']) ? h($data['description']) : ''; ?></textarea>
        </div>