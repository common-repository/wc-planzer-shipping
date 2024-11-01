<?php

namespace Planzer\Note;

use WC_Order;
use Planzer\Note\Types\DeliveryNote;
use Planzer\Note\Types\LabelNote;
use Planzer\Package\Package;

class NoteFactory
{
  public static function create(WC_Order $order, Package $package, string $note_type): ?Note
  {
    switch ($note_type) {
      case 'delivery_note':
          $note = new DeliveryNote($order, $package, ['format' => 'A4', 'orientation' => 'P', 'margin_top' => 16.9, 'margin_footer' => 16.9, 'margin_bottom' => 18]);
          break;
      case 'label_note':
        $note = new LabelNote($order, $package, ['format' => 'A6', 'orientation' => 'L', 'margin_right' => 0, 'margin_left' => 0, 'margin_top' => 2, 'margin_bottom' => 2]);
          break;
      default:
          return null;
    }

    return new Note($order, $note);
  }
}
