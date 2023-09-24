<template>
  <div>
    <div v-if="currentStep === 1">
      <!-- 1ページ目の質問内容 -->
      <div>
        <label>生年月日:</label>
        <input type="date" v-model="answers.birthdate" :max="today">
      </div>
      <div>
        <label>都道府県:</label>
        <select v-model="answers.prefecture">
         <option v-for="pref in prefectures" :key="pref" :value="pref">{{ pref }}</option>
        </select>

      </div>
      <div>
        <label>市町村:</label>
        <input type="text" v-model="answers.city">
      </div>
      <div>
        <label>住所詳細:</label>
        <textarea v-model="answers.address_detail"></textarea>
      </div>
      <div>
        <enum-select-component 
          label="世帯主" 
          :options="['はい', 'いいえ', 'わからない']" 
          v-model="answers.is_household_head">
        </enum-select-component>
      </div>
      <!-- ... 他の質問も同様に -->

    </div>

    <!-- ... 2〜5ページ目 -->

    <button @click="nextStep">次へ</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentStep: 1,
      today: new Date().toISOString().split('T')[0],
      answers: {
        birthdate: '',
        prefecture: '',
        city: '',
        address_detail: '',
        is_household_head: '',
        spouse_status: '',
        has_dependent_children: '',
        lived_with_others: ''
        // 他のページの回答もここに追加
      },
      prefectures: ["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県","新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","鳥取県","島根県","岡山県",
"広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県",
"宮崎県","鹿児島県","沖縄県"] 
      // その他のstate...
    };
  },
  methods: {
    // その他のmethods...
  }
};
</script>
