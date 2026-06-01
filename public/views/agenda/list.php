<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="panel">
    <header>
        <h2>Compromissos</h2>
        <p>Use os botões para editar ou remover itens da agenda.</p>
    </header>

    <?php if (empty($items)): ?>
        <p class="empty">Nenhum compromisso registrado ainda.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data / Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= nl2br(htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8')) ?></td>
                        <td><?= htmlspecialchars($item['event_date'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="actions">
                            <a class="button small" href="?action=edit&id=<?= $item['id'] ?>">Editar</a>
                            <form method="post" action="?action=delete&id=<?= $item['id'] ?>" onsubmit="return confirm('Deseja realmente excluir este compromisso?');">
                                <button class="button danger small" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
