<?php

final class NF_ConditionalLogic_Triggers_ShowField implements NF_ConditionalLogic_Trigger
{
    public function process( NF_Database_Models_Field &$field )
    {
        if( $field->get_setting( 'value' ) ) return;
        $submitted_value = $field->get_setting( 'submitted_value' );
        $field->update_setting( 'value', $submitted_value );

        // Visible fields should be validated for required.
        if( 1 == $field->get_setting( 'required' ) ) {

            // Clear bypass flag.
            $field->update_setting('conditionally_required', true);
        }
    }
}