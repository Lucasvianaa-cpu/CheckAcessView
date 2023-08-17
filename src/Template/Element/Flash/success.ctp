<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="message success" style="display: none!important;">
    <input id="success-sweet" value="<?= $message ?>">
</div>
