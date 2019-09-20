
    <div class="row">
        <div class="file-field input-field">
            <div class="btn">
                <span>.txt</span>
                <input type="file" @change="loadtxt($event)">
            </div>
        <div class="file-path-wrapper">
        <input class="file-path validate" type="text" placeholder="Upload files data" >
      </div>
    </div>
    <div class="input-field col s12 m12">
                    <p></p>
                <button class="btn waves-effect waves-light" @click="addDataFiles()">Submit
                    <i class="material-icons right">send</i>
                </button>
                </div>
    </div>
</form>