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
      <div>
        <enum-select-component 
          label="配偶者はいますか？" 
          :options="['はい', 'いいえ', 'わからない']" 
          v-model="answers.spouse_status">
        </enum-select-component>
      </div>
      <div>
        <enum-select-component 
          label="18歳以下の子どもはいますか？" 
          :options="['はい', 'いいえ', 'わからない']" 
          v-model="answers.has_dependent_children">
        </enum-select-component>
      </div>
      <div>
        <enum-select-component 
          label="家族以外で同居していた人はいますか？" 
          :options="['はい', 'いいえ', 'わからない']" 
          v-model="answers.lived_with_others">
        </enum-select-component>
      </div>
    </div>

    <!-- ... 2ページ目 -->
    <div v-if="currentStep === 2">
      <div>
        <label>職種:</label>
        <select v-model="answers.occupation_id">
          <option v-for="occupation in occupations" :key="occupation.id" :value="occupation.id">
            {{ occupation.name }}
          </option>
        </select>
      </div>

      <div>
        <enum-select-component 
          label="複数の収入はありますか？" 
          :options="['はい', 'いいえ', 'わからない']"
          v-model="answers.multiple_incomes">
        </enum-select-component>
      </div>

      <div>
        <enum-select-component 
          label="年金受給の状況は？" 
          :options="['年金受給（公的年金）', '年金受給（厚生年金）', '遺族年金', '障害年金', '受給していない','わからない']"
          v-model="answers.pension_reception">
        </enum-select-component>
      </div>
    
      <div>
        <enum-select-component 
          label="介護認定を受けていますか？" 
          :options="['はい', 'いいえ', 'わからない']"
          v-model="answers.care_certification">
        </enum-select-component>
      </div>
    </div>

    </div>

    <!-- ... 3ページ目 -->
    <div v-if="currentStep === 3">
      <div>
        <enum-select-component 
          label="現在の住居の形態は？" 
          :options="['持ち家', '賃貸', '社宅・寮', 'その他', 'わからない']"
          v-model="answers.residence">
        </enum-select-component>
      </div>
      
      <div>
        <enum-select-component 
          label="物件のタイプは？" 
          :options="['戸建て', '集合住宅（アパート・マンションなど）', 'わからない']"
          v-model="answers.property_type">
        </enum-select-component>
      </div>
      
      <div>
        <enum-select-component 
          label="物件の所有者は？" 
          :options="['本人', '本人以外', '共同名義', 'わからない']"
          v-model="answers.property_ownership">
        </enum-select-component>
      </div>
      
      <div>
        <enum-select-component 
          label="借地権がある物件は持っていますか？" 
          :options="['ある', 'ない', 'わからない']"
          v-model="answers.rented_land">
        </enum-select-component>
      </div>
      
      <div>
        <enum-select-component 
          label="賃貸物件を所有していますか？" 
          :options="['ある', 'ない', 'わからない']"
          v-model="answers.leased_property">
        </enum-select-component>
      </div>
      
      <div>
        <enum-select-component 
          label="土地を所有していますか？" 
          :options="['ある', 'ない', 'わからない']"
          v-model="answers.owned_land">
        </enum-select-component>
      </div>

    </div>

    <!-- ... 4ページ目 -->
    <div v-if="currentStep === 4">
      <h3>金融情報の選択</h3>
        <div v-for="option in financialOptions" :key="option.id">
          <label :for="'option-' + option.id">
            <input type="checkbox" 
                  :id="'option-' + option.id" 
                  :value="option.id" 
                  v-model="selectedFinancialOptions">
            {{ option.option_name }}
          </label>
        </div>

    </div>

    <!-- ... 5ページ目 -->
    <div v-if="currentStep === 5">
        <h3>その他の情報</h3>
    
        <div>
          <enum-select-component 
            label="車種:" 
            :options="['普通車', '軽自動車', 'バイク', '原付自転車', 'なし', 'わからない']"
            v-model="answers.vehicle">
          </enum-select-component>
        </div>
        
        <div>
          <enum-select-component 
            label="ペット:" 
            :options="['犬', '猫', '許可が必要な動物', 'その他', 'ペットはいない']"
            v-model="answers.has_pet">
          </enum-select-component>
        </div>
        
        <div>
          <enum-select-component 
            label="相続人の人数:" 
            :options="['1人', '2〜3人', '4人以上', 'わからない']"
            v-model="answers.number_of_heirs">
          </enum-select-component>
        </div>

        <div>
          <label>遺言書状況:</label>
          <select v-model="answers.will_status_id">
            <option v-for="status in willStatuses" :key="status.id" :value="status.id">
              {{ status.status_name }}
            </option>
          </select>
        </div>

    </div>
    <button v-if="currentStep < 5" @click="nextStep">次へ</button>
    <button v-else @click="showDiagnosisResults">やることリストを見る</button>

    <!-- 5ページ目終了後に表示するtodoリスト -->
    <div v-if="showResults">
        <!-- `diagnosis_results` の内容やtodoリストのコンポーネントをここに配置 -->
    </div>
</template>

<script>
import EnumSelectComponent from './EnumSelectComponent.vue'; 

export default {
  components: {
    'enum-select-component': EnumSelectComponent
  },
  data() {
    return {
      showResults: false,
      currentStep: 1,
      today: new Date().toISOString().split('T')[0],
      showResults: false,
      answers: {
        birthdate: '',
        prefecture: '',
        city: '',
        address_detail: '',
        is_household_head: '',
        spouse_status: '',
        has_dependent_children: '',
        lived_with_others: '',
        occupation_id: '',
        multiple_incomes: '',
        pension_reception: '',
        care_certification: '',
        residence: '',
        property_type: '',
        property_ownership: '',
        rented_land: '',
        leased_property: '',
        owned_land: '',
        vehicle: '',
        has_pet: '',
        number_of_heirs: '',
        will_status_id: '',
        // 他のページの回答もここに追加
      },
      prefectures: ["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県","新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県","静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県","奈良県","和歌山県","鳥取県","島根県","岡山県",
"広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県",
"宮崎県","鹿児島県","沖縄県"],
      occupations: [
        { id: 1, name: '会社員・会社役員' },
        { id: 2, name: '会社経営' },
        { id: 3, name: '派遣社員' },
        { id: 4, name: 'パート・アルバイト（保険あり）' },
        { id: 5, name: 'パート・アルバイト（保険なし）' },
        { id: 6, name: '個人事業・フリーランス' },
        { id: 7, name: '主夫・主婦' },
        { id: 8, name: 'その他' },
        { id: 9, name: '分からない' }
      ],
      financialOptions: [
        { id: 1, option_name: '現金・預貯金（外貨預金含む）' },
        { id: 2, option_name: '有価証券（上場株式・債券・投資信託など）' },
        { id: 3, option_name: '非上場株式' },
        { id: 4, option_name: '生命保険（医療保険・がん保険など）' },
        { id: 5, option_name: '損害保険（火災・家財・自動車保険など）' },
        { id: 6, option_name: '暗号資産（BTC・NFTなど）' },
        { id: 7, option_name: '金' },
        { id: 8, option_name: 'ゴルフ会員権・預託金' },
        { id: 9, option_name: 'その他の金融資産' },
        { id: 10, option_name: '貸付金' },
        { id: 11, option_name: '住宅ローン' },
        { id: 12, option_name: '自動車ローン' },
        { id: 13, option_name: '教育ローン' },
        { id: 14, option_name: 'その他の借入' },
        { id: 15, option_name: '連帯保証人' },
        { id: 16, option_name: 'クレジットカード' },
        { id: 17, option_name: 'ICカード' },
        { id: 18, option_name: 'プリペイドカード' },
        { id: 19, option_name: 'コード決済' },
        { id: 20, option_name: 'iDeCo' },
      ],
      selectedFinancialOptions: [],

      willStatuses: [
        { id: 1, status_name: '公正証書遺言あり' },
        { id: 2, status_name: '自筆証書遺言あり' },
        { id: 3, status_name: '遺言なし' },
        { id: 4, status_name: '法定後見人あり' },
        { id: 5, status_name: '任意後見人あり' },
        { id: 6, status_name: '家族信託あり' },
        { id: 7, status_name: 'エンディングノートあり' },
        { id: 8, status_name: 'わからない' }
      ],

      // その他のstate...
    };
  },
  methods: {
    nextStep() {
    if (this.currentStep < 5) { 
      this.currentStep++;
     } 
  },
    showDiagnosisResults() {
      window.location.href = "/diagnosis/results";
      //this.showResults = true;
    // その他のmethods...
  }
  }
};
</script>
