<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            Radar Soliton
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            ¡Snake....!¡SNAAAKEEEEE....!
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            Si por algún motivo no aparece, buscalo en la carpeta Span :/
                            <button class="modal-default-button" @click="$emit('close')">
                                Entendido
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
name: "ModalAgradecimiento"
}
</script>

<style scoped>

</style>
