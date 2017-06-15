<div class="pagination">
<?php
if ($this->Paginator->hasPrev()) {
    echo $this->Paginator->prev('<');
}

if ($this->Paginator->counter('{:pages}') > 1) {
    echo $this->Paginator->numbers([
            'separator' => ' | '
    ]);
}

if ($this->Paginator->hasNext()) {
    echo $this->Paginator->next('>');
}
?>
</div>