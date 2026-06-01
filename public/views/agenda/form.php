<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="panel">
    <header>
        <h2><?= $formTitle ?></h2>
        <p><?= $formDescription ?></p>
    </header>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form id="form-agenda" method="post" action="<?= $formAction ?>">
        <label>
            Título
            <input id="title" type="text" name="title" value="<?= htmlspecialchars(isset($item['title']) ? $item['title'] : '', ENT_QUOTES, 'UTF-8') ?>" required>
            <span id="err-title" style="color:red; font-size:13px; display:none;"></span>
        </label>

        <label>
            Descrição
            <textarea id="description" name="description" rows="5" required><?= htmlspecialchars(isset($item['description']) ? $item['description'] : '', ENT_QUOTES, 'UTF-8') ?></textarea>
            <span id="err-description" style="color:red; font-size:13px; display:none;"></span>
        </label>

        <label>
            Data e Hora
            <input id="event_date" type="datetime-local" name="event_date" value="<?= isset($item['event_date']) ? date('Y-m-d\TH:i', strtotime($item['event_date'])) : '' ?>" required>
            <span id="err-event_date" style="color:red; font-size:13px; display:none;"></span>
        </label>

        <div class="form-actions">
            <button class="button primary" type="submit"><?= $submitText ?></button>
            <a class="button secondary" href="?action=list">Voltar</a>
        </div>
    </form>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
