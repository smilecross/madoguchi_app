<!-- EnumSelectComponent.vue -->
<template>
  <div>
    <label>{{ label }}:</label>
    <select v-model="selectedValue">
      <option v-for="option in options" :key="option" :value="option">{{ option }}</option>
    </select>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      required: true
    },
    options: {
      type: Array,
      required: true
    },
    value: {
      type: String,
      default: ''
    }
  },
  computed: {
    selectedValue: {
      get() { return this.value; },
      set(value) { this.$emit('update:value', value); }
    }
  }
};
</script>
